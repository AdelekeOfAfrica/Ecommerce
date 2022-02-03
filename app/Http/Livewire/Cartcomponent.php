<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

use Illuminate\Support\Str;

class Cartcomponent extends Component
{

    public function increaseQuantity($rowId)
    { 
       $product = Cart::instance('cart')->get($rowId);
       $qty = $product->qty + 1;
       Cart::update($rowId,$qty);
       $this->emitTo('cart-count-component','refreshComponent');
      
    }
  
    public function decreaseQuantity($rowId)
    { 
       $product = Cart::instance('cart')->get($rowId);
       $qty = $product->qty -  1;
       Cart::update($rowId,$qty);
       $this->emitTo('cart-count-component','refreshComponent');
      
    }

    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','product successfully deleted');
    }

    public function destroyAll(){
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','all product successfully deleted');
        
        
    }

    public function switchToSaveForLater($rowId){
        $item  = Cart::instance('cart')->get($rowId);
        cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id, $item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','your product has being successfully saved for later ');
    }
    public function moveToCart($rowId){
        $item  = Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('s_success_message','your product has being successfully saved to cart');
    }

    public function deleteFromSaveForLater($rowId){
        cart::instance('saveForLater')->remove($rowId); 
        session()->flash('s_success_message','your product has being successfully deleted');
    }
    public function render()
    {
        return view('livewire.cartcomponent')->layout('layouts.base');
    }
}
