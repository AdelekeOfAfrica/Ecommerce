<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;

class AdminHomeSliderComponent extends Component
{  
    public function deleteProduct($slide_id){
        $slide = HomeSlider::find($slide_id);
        $slide->delete();
        session()->flash('message',' image slide successfully deleted'); 
    }
    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders])->layout('layouts.base');
    }
}
