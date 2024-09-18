<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfitController extends Controller
{
    public function profit(Request $request)
    {
        try {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');

            // Fetch OrderItems with related product and stock details using joins
            $sellItems = DB::table('order_items')
                ->join('products', 'order_items.product_id', '=', 'products.id')
                ->join('stocks', 'order_items.stock_id', '=', 'stocks.id')
                ->select(
                    'order_items.order_id',
                    'order_items.product_id',
                    'products.product_name',
                    'products.bar_code as product_barcode',
                    'order_items.quantity',
                    'order_items.price as selling_price',
                    'stocks.stock_price',
                    'order_items.discount_price as discount',
                    DB::raw('((order_items.price - stocks.stock_price) - order_items.discount_price) * order_items.quantity as profit')
                )
                ->whereBetween('order_items.date', [$startDate, $endDate])
                ->get();

            $sellItemsToday = DB::table('order_items')
                ->join('products', 'order_items.product_id', '=', 'products.id')
                ->join('stocks', 'order_items.stock_id', '=', 'stocks.id')
                ->select(
                    'order_items.order_id',
                    'order_items.product_id',
                    'products.product_name',
                    'products.bar_code as product_barcode',
                    'order_items.quantity',
                    'order_items.price as selling_price',
                    'stocks.stock_price',
                    'stocks.discount_price',
                    'order_items.discount_price as discount',
                    DB::raw('((order_items.price - stocks.stock_price) - order_items.discount_price) * order_items.quantity as profit')
                )
                ->whereDate('order_items.date', today())
                ->get();

            $sellItems7day = DB::table('order_items')
                ->join('products', 'order_items.product_id', '=', 'products.id')
                ->join('stocks', 'order_items.stock_id', '=', 'stocks.id')
                ->select(
                    'order_items.order_id',
                    'order_items.product_id',
                    'products.product_name',
                    'products.bar_code as product_barcode',
                    'order_items.quantity',
                    'order_items.price as selling_price',
                    'stocks.stock_price',
                    'stocks.discount_price',
                    'order_items.discount_price as discount',
                    DB::raw('((order_items.price - stocks.stock_price) - order_items.discount_price) * order_items.quantity as profit')
                )
                ->whereBetween('order_items.date', [today(), today()->addDays(7)])
                ->get();

            $sellItems30day = DB::table('order_items')
                ->join('products', 'order_items.product_id', '=', 'products.id')
                ->join('stocks', 'order_items.stock_id', '=', 'stocks.id')
                ->select(
                    'order_items.order_id',
                    'order_items.product_id',
                    'products.product_name',
                    'products.bar_code as product_barcode',
                    'order_items.quantity',
                    'order_items.price as selling_price',
                    'stocks.stock_price',
                    'stocks.discount_price',
                    'order_items.discount_price as discount',
                    DB::raw('((order_items.price - stocks.stock_price) - order_items.discount_price) * order_items.quantity as profit')
                )
                ->whereBetween('order_items.date', [today(), today()->addDays(30)])
                ->get();

            // Function to aggregate profits by product
            $aggregateProfits = function ($sellItems) {
                $profits = [];

                foreach ($sellItems as $item) {
                    $productId = $item->product_id;

                    if (isset($profits[$productId])) {
                        $profits[$productId]['quantity'] += $item->quantity;
                        $profits[$productId]['profit'] += $item->profit;
                    } else {
                        $profits[$productId] = [
                            'order_id' => $item->order_id,
                            'product_id' => $item->product_id,
                            'product_name' => $item->product_name,
                            'quantity' => $item->quantity,
                            'selling_price' => $item->selling_price,
                            'stock_price' => $item->stock_price,
                            'discount' => $item->discount,
                            'discount_price'=>$item->discount_price,
                            'profit' => $item->profit,
                            'barcode' => $item->product_barcode
                        ];
                    }
                }

                return array_values($profits);
            };

            $profits = $aggregateProfits($sellItems);
            $profitsToday = $aggregateProfits($sellItemsToday);
            $profits7Day = $aggregateProfits($sellItems7day);
            $profits30Day = $aggregateProfits($sellItems30day);

            $totalProfitToday=0;
            $totalProfit7Day=0;
            $totalProfit30Day=0;
            $totalSaleToday=0;
            $totalSale7Day=0;
            $totalSale30Day=0;

            foreach ($profitsToday as $profit){
                $totalProfitToday += $profit['profit'];
                $totalSaleToday += $profit['selling_price'] * $profit['quantity'];
            }

            foreach ($profits7Day as $profit){
                $totalProfit7Day += $profit['profit'];
                $totalSale7Day += $profit['selling_price'] * $profit['quantity'];
            }

            foreach ($profits30Day as $profit){
                $totalProfit30Day += $profit['profit'];
                $totalSale30Day += $profit['selling_price'] * $profit['quantity'];
            }

//            dd($profits,$profitsToday,$profits7Day,$profits30Day);
            // Return the profits for each time range in a view

            $user = Auth::user();
            return view('owner.sidebar_pages.sale.profit', compact('user',
                'profits',
                'profitsToday',
                'profits7Day',
                'profits30Day',
                'totalProfitToday',
                'totalProfit7Day',
                'totalProfit30Day',
                'totalSaleToday',
                'totalSale7Day',
                'totalSale30Day'

            ));

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
