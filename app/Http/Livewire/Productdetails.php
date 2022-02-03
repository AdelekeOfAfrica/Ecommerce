<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Sale;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;

class Productdetails extends Component
{
    public $slug;
    public $qty;

    public function mount($slug){
        $this->slug = $slug;
        $this->qty =1;
    }
     // this function is used to create and add the cart product details and note the 1 means quantity 
     public function store($product_id,$product_name,$product_price){
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added to cart');
        return redirect()->route('product.cart');
    }
    //end of the create and add function 

    // increasing the product detail quantity 
    public function increaseQuantity()
    {
        $this->qty++;
    }
    // decreasing the product detail quantity 
    public function decreaseQuantity(){
        if($this->qty > 1)
        {
            $this->qty--;
        }
    }
  
    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $p_product = Product::inRandomOrder()->limit(4)->get();
        $r_product=Product::where('category_id',$product->category_id)->inRandomOrder()->limit(6)->get();
        $sales = Sale::find(1);
        return view('livewire.productdetails',['product'=>$product,'p_product'=>$p_product,'r_product'=>$r_product,'sales'=>$sales])->layout('layouts.base');
    }
}
