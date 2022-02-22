<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Settings;

class FooterComponent extends Component
{
    public function render()
    {
        $settings = Settings::find(1);
        return view('livewire.footer-component',['settings'=>$settings]);
    }
}
