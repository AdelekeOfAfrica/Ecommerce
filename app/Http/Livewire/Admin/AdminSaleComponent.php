<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class AdminSaleComponent extends Component

{
    public  $sale_date;
    public $status;

   public function mount(){
       $sale = Sale::find(1);
       $this->sale_date = $sale->sales_date;
       $this->status = $sale->status;
   }
   public function updateSale(){
       $sale = Sale::find(1);
       $sale->sales_date = $this->sale_date;
       $sale->status = $this->status;
       $sale->save();
       session()->flash('message','Record has been successfully updated');
   }
    public function render()
    {
        return view('livewire.admin.admin-sale-component')->layout('layouts.base');
    }
}
