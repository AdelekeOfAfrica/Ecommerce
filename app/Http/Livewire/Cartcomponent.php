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
    public function render()
    {
        return view('livewire.cartcomponent')->layout('layouts.base');
    }
}
