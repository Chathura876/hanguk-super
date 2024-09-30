<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\GrnBill;
use App\Models\GrnBillItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class Grn_Controller extends Controller
{
    public function index ()
    {
        $user = Auth::user();
        $bill = GrnBill::orderBy('id', 'desc')->get();


        return view('owner.sidebar_pages.GRN.grn', compact('bill', 'user'));
    }

    public function receipt($id)
    {
        try {
            $bill= GrnBill::query()
                ->where('id', $id)
                ->first();
            $billItem = GrnBillItem::query()
                ->where('grn_id', $bill->id)
                ->join('products', 'grn_bill_items.item_id', '=', 'products.id')
                ->select('grn_bill_items.*', 'products.product_name as product_name')
                ->get();


            return view('owner.sidebar_pages.GRN.GRN_receipt',compact('bill','billItem'));
        }
        catch (Exception $exception){
            return $exception;
        }

    }
}
