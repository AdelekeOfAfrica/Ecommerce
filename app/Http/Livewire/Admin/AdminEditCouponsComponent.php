<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;


class AdminEditCouponsComponent extends Component
{
    public $coupon_id;
    public $code;
    public $type;
    public $value;
    public $cart_value;
    public $expiry_date;


    public function mount($coupon_id){
        $coupon = Coupon::find($coupon_id);
        $this->code = $coupon->code;
        $this->type =$coupon->type;
        $this->value =$coupon->value;
        $this->cart_value =$coupon->cart_value;
        $this->coupon_id =$coupon->id;
        $this->expiry_date =$coupon->expiry_date;

    }

    public function Updated($fields){
     $this->validateOnly($fields,[
        'code'=>'required',
        'type'=>'required',
        'value'=>'required|numeric',
        'cart_value'=>'required|numeric',
        'expiry_date'=>'required'
     ]);
    }

    public function updateCoupon (){
        $this->validate([
            'code'=>'required',
            'type'=>'required',
            'value'=>'required|numeric',
            'cart_value'=>'required|numeric',
            'expiry_date'=>'required'
        ]);
        $coupon =Coupon::find($this->coupon_id);
        $coupon->code =$this->code;
        $coupon->type =$this->type;
        $coupon->value =$this->value;
        $coupon->cart_value =$this->cart_value;
        $coupon->expiry_date =$this->expiry_date;
        $coupon->save();
        session()->flash('message','Coupon updated successfully');


    }
   
    public function render()
    {
        return view('livewire.admin.admin-edit-coupons-component')->layout('layouts.base');
    }
}
