<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;

class AdminProductPageComponent extends Component
{  
    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        session()->flash('message', 'product successfully deleted');
    }
    public function render()
    {
        $products = Product::paginate(12);
        return view('livewire.admin.admin-product-page-component',['products'=>$products])->layout('layouts.base');
    }
}
