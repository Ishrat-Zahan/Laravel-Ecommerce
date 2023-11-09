<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $dailyOrder = Order::whereRaw('DATE(created_at) = CURDATE()')->where('status', 'pending')->sum('total');


        $monthlySell = Order::whereRaw('YEAR(created_at) = YEAR(NOW()) AND MONTH(created_at) = MONTH(NOW())')
        ->where('status', 'pending')->sum('total');
           // dd($monthlySell);
  
        // dd($dailyOrder);
        return view('layouts.content',['dailyOrder' => $monthlySell, 'monthlySell' => $monthlySell]);
    }
}
