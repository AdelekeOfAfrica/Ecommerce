<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use App\Models\Order;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $orders= Order::orderBy('created_at','DESC')->get()->take(10);
        $totalsales= Order::where('status','delivered')->count();
        $totalrevenue =Order::where('status','delivered')->sum('total');
        $todaysales =Order::where('status','delivered')->whereDate('created_at',Carbon::today())->count();
        $todayrevenue =Order::where('status','delivered')->whereDate('created_at',Carbon::today())->sum('total');
        return view('livewire.admin.admin-dashboard-component',['orders'=>$orders,
        'totalsales'=>$totalsales,
        'totalrevenue'=>$totalrevenue,
        'todaysales'=>$todaysales,
        'todayrevenue'=>$todayrevenue
        ])->layout('layouts.base');
    }
}
