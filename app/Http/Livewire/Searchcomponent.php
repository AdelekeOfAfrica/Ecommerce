<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
Use Cart;


class Searchcomponent extends Component
{   
    public $sorting;
    public $pagesize;
    public $search ;
    public $product_cat;
    public $product_cat_id;
    
    public function mount()
    {
      $this->sorting="default";
      $this->pagesize=12; 
      $this->fill(request()->only('search','product_cat','product_cat_id'));   
    }
    
    // this function is used to create and add the cart product details and note the 1 means quantity 
    public function store($product_id,$product_name,$product_price){
        Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added to cart');
        return redirect()->route('product.cart');
    }
    //end of the create and add function 
    public function render()
    {
        if($this->sorting== "date"){

            $products = Product::where('name','like','%'.$this->search . '%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('created_at','DESC')->paginate($this->pagesize);
        }

        elseif($this->sorting== "price"){
            $products= Product::where('name','like','%'.$this->search . '%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting== "price-desc"){
            $products = Product::where('name','like','%'.$this->search . '%')->where('category_id','like','%'.$this->product_cat_id.'%')->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else{
            $products= Product::where('name','like','%'.$this->search . '%')->where('category_id','like','%'.$this->product_cat_id.'%')->paginate($this->pagesize);
        }

        $categories = Category::all();


       
        return view('livewire.searchcomponent',['products'=>$products,'categories'=>$categories])->layout('layouts.base');;  
    }
}
