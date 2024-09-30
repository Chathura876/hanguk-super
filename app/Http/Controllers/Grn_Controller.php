<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Grn_Controller extends Controller
{
    public function index ()
    {
        $user = Auth::user();
        $bill = Order::orderBy('id', 'desc')->get();

        return view('owner.sidebar_pages.GRN.grn', compact('bill', 'user'));
    }
}
