<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class SuperMarketPosController extends Controller
{



    public function productScan(Request $request)
    {
        try {
            $product = null;

            // Search for the product by name or barcode
            if ($request->name || $request->barcode) {
                $products = Product::query()
                    ->where(function ($query) use ($request) {
                        $query->where('product_name', $request->name)
                            ->orWhere('bar_code', $request->name ?? $request->barcode);
                    })
                    ->first();

                if ($products) {
                    // Fetch stock details for the product
                    $product_stock = Stock::query()
                        ->where('id', $products->id)
                        ->first();

                    if ($product_stock) {
                        // Merge product and stock data
                        $product = array_merge(
                            $products->toArray(),
                            $product_stock->toArray()
                        );
                    }
                }
            }

            // Check if product exists and has quantity
            if ($product && $product['qty'] != 0) {

                return response()->json($product, 200);
            } else {
                return response()->json('Stock is 0', 201);
            }

        } catch (\Exception $exception) {
            // Handle exception and return error response
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }


    public function dashboard()
    {
        return view('cashier.cashier_index');
    }

    public function damage_items()
    {
        return view('cashier.sidebar_pages.damage_items');
    }

    public function add_damage_items()
    {
        return view('cashier.sidebar_pages.add_damage_items');
    }

    public function edit_damage_items()
    {
        return view('cashier.sidebar_pages.edit_damage_items');
    }

    public function stock()
    {
        return view('cashier.sidebar_pages.stock');
    }

    public function reports()
    {
        return view('cashier.sidebar_pages.reports');
    }

    public function members()
    {
        return view('cashier.sidebar_pages.members');
    }

    public function cheque_list()
    {
        return view('cashier.sidebar_pages.cheque.cheque_list');
    }
    public function add_cheque()
    {
        return view('cashier.sidebar_pages.cheque.add_cheque');
    }
    public function view_cheque()
    {
        return view('cashier.sidebar_pages.cheque.view_cheque');
    }

    public function edit_cheque()
    {
        return view('cashier.sidebar_pages.cheque.edit_cheque');
    }

}
