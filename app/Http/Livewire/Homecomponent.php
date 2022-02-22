<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Sale;
use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use App\Models\HomeSlider;
use Illuminate\Support\Str;
use App\Models\HomeCategory;
use Illuminate\Support\Facades\Auth;
use Cart;

class Homecomponent extends Component
{
    public function render()
    {
        $slides = HomeSlider::where ('status',1)->get();
        $latestproducts = Product::orderBy('created_at','DESC')->get()->take(8);
        $category= HomeCategory::find(1);
        $cats = explode(',',$category->sel_categories);
        $categories = Category::whereIn('id',$cats)->get();
        $no_of_products =$category->no_of_products;
        $sproducts = Product::where('Sale_Price','>',0)->inRandomOrder()->get()->take(8);
        $sales = Sale::find(1);
        
        if(Auth::check())
        {
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('instance')->restore(Auth::user()->email);
        }

        return view('livewire.homecomponent',['slides'=>$slides,'latestproducts'=>$latestproducts,'categories'=>$categories,'no_of_products'=>$no_of_products,'sproducts'=>$sproducts,'sales'=>$sales])->layout('layouts.base');
    }
}
 