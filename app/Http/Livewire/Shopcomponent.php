<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
Use Cart;


class Shopcomponent extends Component
{

    public $sorting;
    public $pagesize;
    public $min_prize;
    public $max_price;

    public function mount()
    {
    $this->sorting="default";
    $this->pagesize=12;  
    $this->min_price = 1;
    $this->max_price = 1000;  
    }

    // this function is used to create and add the cart product details and note the 1 means quantity 
    public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added to cart');
        return redirect()->route('product.cart');
    }
    //end of the create and add function 

    public function addToWishlist($product_id,$product_name,$product_price)
    {
       Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
       $this->emitTo('wishlist-count-component','refreshComponent');
    }

    public function removeFromWishlist($product_id){

       foreach(Cart::instance('wishlist')->content() as $witem){
           if($witem->id == $product_id){
               Cart::instance ('wishlist')->remove($witem->rowId);
               $this->emitTo('wishlist-count-component','refreshComponent');
               return;
           }
       }
    }
   
    public function render()
    {

        if($this->sorting== 'date'){

            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('created_at','DESC')->paginate($this->pagesize);
        }

        else if($this->sorting== "price"){
            $products= Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting== "price-desc"){
            $products = Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else{
            $products= Product::whereBetween('regular_price',[$this->min_price,$this->max_price])->paginate($this->pagesize);
        }

        $categories = Category::all();

        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('instance')->store(Auth::user()->email);
        }

        return view('livewire.shopcomponent',['products'=>$products,'categories'=>$categories])->layout('layouts.base');
    }
}
