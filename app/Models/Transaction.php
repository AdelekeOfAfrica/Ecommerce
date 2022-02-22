<?php

namespace App\Models;
use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    
    protected $table="transactions";

    public function order(){
        
        return $this->belongsTo(Order::class,'order_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
