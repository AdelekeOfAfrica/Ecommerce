<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
Use Cart;

class CategoryComponent extends Component
{
 public $sorting;
public $pagesize;
public $category_slug;

public function mount($category_slug)
{
  $this->sorting="default";
  $this->pagesize=12;    
  $this->category_slug=$category_slug;
}

// this function is used to create and add the cart product details and note the 1 means quantity 
public function store($product_id,$product_name,$product_price){
    Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
    session()->flash('success_message','Item added to cart');
    return redirect()->route('product.cart');
}
//end of the create and add function 

    use WithPagination;
    public function render()
    {
        $category=Category::where('slug',$this->category_slug)->first();
        $category_id=$category->id;
        $category_name=$category->name;


        if($this->sorting== "date"){

            $products = Product::where('category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pagesize);
        }

        elseif($this->sorting== "price"){
            $products= Product::where('category_id',$category_id)->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        elseif($this->sorting== "price-desc"){
            $products = Product::where('category_id',$category_id)->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else{
            $products= Product::where('category_id',$category_id)->paginate($this->pagesize);
        }

        $categories = Category::all();

        $category=Category::where('slug',$this->category_slug)->first();

      
        return view('livewire.category-component',['products'=>$products,'categories'=>$categories,'category_name'=>$category_name])->layout('layouts.base');
    }
}
