<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Stock;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class SuperMarketPosController extends Controller
{


    public function productScan(Request $request)
    {
        try {
            $product = null;

            // Ensure name or barcode is provided
            if ($request->has('name') || $request->has('barcode')) {

                // Search for the product by name or barcode with partial matching
                $products = Product::query()
                    ->where(function ($query) use ($request) {
                        if ($request->filled('name')) {
                            // Partial match for product name
                            $query->where('product_name', 'LIKE', '%' . $request->name . '%');
                        }

                        if ($request->filled('name')) {
                            // Partial match for barcode
                            $query->orWhere('bar_code', 'LIKE', '%' . $request->name . '%');
                        }
                    })
                    ->first();

                // If the product exists
                if ($products) {
                    // Fetch stock details for the product
                    $product_stock = Stock::query()
                        ->where('item_id', $products->id)
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

            // If product exists and has stock
            if ($product && $product['qty'] != 0) {
                return response()->json($product, 200);
            } else {
                return response()->json('Stock is 0', 201);
            }

        } catch (\Exception $exception) {
            // Handle exceptions and return error response
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }

    public function productSugess(Request $request)
    {
        try {
            // Ensure name or barcode is provided
            if ($request->has('name') || $request->has('barcode')) {

                // Search for the products by name or barcode with partial matching
                $products = Product::query()
                    ->where(function ($query) use ($request) {
                        if ($request->filled('name')) {
                            // Partial match for product name
                            $query->where('product_name', 'LIKE', '%' . $request->name . '%');
                        }

                        if ($request->filled('barcode')) {
                            // Partial match for barcode
                            $query->orWhere('bar_code', 'LIKE', '%' . $request->barcode . '%');
                        }
                    })
                    ->get();  // Use get() instead of first() to fetch multiple results

                // If there are matching products
                if ($products->count() > 0) {
                    // Fetch stock details for each product
                    $productsWithStock = $products->map(function ($product) {
                        $product_stock = Stock::where('item_id', $product->id)->first();

                        // Merge product and stock data if stock is found
                        if ($product_stock) {
                            return array_merge($product->toArray(), $product_stock->toArray());
                        }
                        return $product->toArray();
                    });

                    return response()->json($productsWithStock, 200);  // Return as JSON array
                }
            }

            // Return no products found
            return response()->json([], 200);  // Return an empty array if no matching products

        } catch (\Exception $exception) {
            // Handle exceptions and return error response
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }


    public function dashboard()
    {
        $user = Auth::user();
        return view('cashier.cashier_index', compact('user'));
    }

    public function damage_items()
    {
        $user = Auth::user();
        return view('cashier.sidebar_pages.damage items.damage_items_list', compact('user'));
    }

    public function add_damage_items()
    {
        $user = Auth::user();
        return view('cashier.sidebar_pages.add_damage_items', compact('user'));
    }

    public function edit_damage_items()
    {
        $user = Auth::user();
        return view('cashier.sidebar_pages.edit_damage_items', compact('user'));
    }

    public function stock()
    {
        try {
//            $search = $request->input('search');
            $userstock = Stock::all();
            // Start the query with eager loading of the related product
            $query = Stock::with('product');
            $stock = $query->paginate(15);
            $user = Auth::user();
            return view('cashier.sidebar_pages.stock', compact('user', 'stock', 'userstock'));
        } catch (\Exception $exception) {
            // Return or handle the exception properly
            return $exception;
        }
    }

    public function create_stock()
    {
        $products = Product::all();
        $stock=Product::all();
        $user=Auth::user();
        return view('cashier.sidebar_pages.stockAdd',compact('stock','products','user'));
    }
    public function stock_store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'qty' => 'required|numeric',
                'stock_price' => 'required|numeric',
                'selling_price' => 'required|numeric',
                'discount_price' => 'nullable|numeric',
                'from_item' => 'nullable|numeric',
                'to_item' => 'nullable|numeric',
                'unit_type' =>'required|string|max:255',
            ]);

            // Create a new stock record
            Stock::query()->create([
                'item_id' => $request->item_id,
                'qty' => $request->qty,
                'stock_price' => $request->stock_price,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'from_item' => $request->from_item,
                'to_item' => $request->to_item,
                'unit' => $request->unit_type
            ]);
            return redirect()->route('stock.index')->with('success', 'Stock added successfully.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'An error occurred: ' . $exception->getMessage());
        }
    }
    public function dailyReport()
    {
        $user = Auth::user();
        $today = now()->startOfDay();
        $stock = Stock::with('product')
            ->whereDate('created_at', $today)
            ->orderBy('id', 'desc')
            ->get();

        return view('cashier.sidebar_pages.reports', compact('user', 'stock', 'today'));
    }
    public function weeklyReport()
    {
        $user = Auth::user();
        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();
        $stock = Stock::with('product')
            ->whereBetween('created_at', [$startOfWeek, $endOfWeek])
            ->orderBy('id', 'desc')
            ->get();

        return view('cashier.sidebar_pages.reports', compact('user', 'stock', 'startOfWeek', 'endOfWeek'));
    }
    public function monthlyReport()
    {
        $user = Auth::user();
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();
        $stock = Stock::with('product')
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->orderBy('id', 'desc')
            ->get();

        return view('cashier.sidebar_pages.reports', compact('user', 'stock', 'startOfMonth', 'endOfMonth'));
    }



    public function reports(Request $request)
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
                ->join('stocks', 'order_items.stock_id', '=', 'stocks.id')
                ->join('products', 'stocks.item_id', '=', 'products.id')
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
                    DB::raw('(
            (order_items.price - stocks.stock_price - order_items.discount_price) * order_items.quantity
        ) as profit')
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
            $totalCostToday=0;

            foreach ($profitsToday as $profit){
                $totalProfitToday += $profit['profit'];
                $totalSaleToday += $profit['selling_price'] * $profit['quantity'];
                $totalCostToday += $profit['stock_price'] * $profit['quantity'];
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
            $totalCashToday= $this->cashPayment();
            $totalCardToday= $this->cardPayment();
            $todayExpences= $this->expencesToday();
//            $todayTotalCost=$this->totalCost();


            return view('cashier.sidebar_pages.reports', compact('user',
                'profits',
                'profitsToday',
                'profits7Day',
                'profits30Day',
                'totalProfitToday',
                'totalProfit7Day',
                'totalProfit30Day',
                'totalSaleToday',
                'totalSale7Day',
                'totalSale30Day',
                 'todayExpences',
                 'totalCardToday',
                   'totalCashToday',
                    'totalCostToday',
            'startDate',
            'endDate'

            ));

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function downloadReport(Request $request)
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
                    DB::raw('IFNULL(order_items.discount_price, 0) as discount'), // Handle NULL
                    DB::raw('((order_items.price - stocks.stock_price) - IFNULL(order_items.discount_price, 0)) * order_items.quantity as profit')
                )
                ->whereBetween('order_items.date', [$startDate, $endDate])
                ->get();

            $sellItemsToday = DB::table('order_items')
                ->join('stocks', 'order_items.stock_id', '=', 'stocks.id')
                ->join('products', 'stocks.item_id', '=', 'products.id')
                ->select(
                    'order_items.order_id',
                    'order_items.product_id',
                    'products.product_name',
                    'products.bar_code as product_barcode',
                    'order_items.quantity',
                    'order_items.price as selling_price',
                    'stocks.stock_price',
                    DB::raw('IFNULL(order_items.discount_price, 0) as discount'), // Handle NULL
                    DB::raw('(
                    (order_items.price - stocks.stock_price - IFNULL(order_items.discount_price, 0)) * order_items.quantity
                ) as profit')
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
                    DB::raw('IFNULL(order_items.discount_price, 0) as discount'), // Handle NULL
                    DB::raw('((order_items.price - stocks.stock_price) - IFNULL(order_items.discount_price, 0)) * order_items.quantity as profit')
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
                    DB::raw('IFNULL(order_items.discount_price, 0) as discount'), // Handle NULL
                    DB::raw('((order_items.price - stocks.stock_price) - IFNULL(order_items.discount_price, 0)) * order_items.quantity as profit')
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
                            'discount' => $item->discount ?? 0, // Handle NULL discount
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

            $totalProfitToday = 0;
            $totalProfit7Day = 0;
            $totalProfit30Day = 0;
            $totalSaleToday = 0;
            $totalSale7Day = 0;
            $totalSale30Day = 0;
            $totalCostToday = 0;

            foreach ($profitsToday as $profit) {
                $totalProfitToday += $profit['profit'];
                $totalSaleToday += $profit['selling_price'] * $profit['quantity'];
                $totalCostToday += $profit['stock_price'] * $profit['quantity'];
            }

            foreach ($profits7Day as $profit) {
                $totalProfit7Day += $profit['profit'];
                $totalSale7Day += $profit['selling_price'] * $profit['quantity'];
            }

            foreach ($profits30Day as $profit) {
                $totalProfit30Day += $profit['profit'];
                $totalSale30Day += $profit['selling_price'] * $profit['quantity'];
            }

            $user = Auth::user();
            $totalCashToday = $this->cashPayment();
            $totalCardToday = $this->cardPayment();
            $todayExpences = $this->expencesToday();
            $todayTotalCost = $this->totalCost();

            // Check if PDF generation is requested
            if ($request->input('generate_pdf')) {
                $pdf = Pdf::loadView('owner.sidebar_pages.sale.Profit_report', compact(
                    'user',
                    'profits',
                    'profitsToday',
                    'profits7Day',
                    'profits30Day',
                    'totalProfitToday',
                    'totalProfit7Day',
                    'totalProfit30Day',
                    'totalSaleToday',
                    'totalSale7Day',
                    'totalSale30Day',
                    'todayExpences',
                    'totalCardToday',
                    'totalCashToday',
                    'totalCostToday',
                    'startDate',
                    'endDate'
                ));
                return $pdf->download('profit_report.pdf'); // Download the PDF
            }

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }



    public function totalCost()
    {
        try {
            $today = Carbon::today();
            $totalCostToday = OrderItem::query()
                ->join('stocks', 'order_items.stock_id', '=', 'stocks.id')
                ->whereDate('order_items.created_at', $today)
                ->selectRaw('SUM(stocks.stock_price) as total_cost')
                ->value('total_cost');;

            return $totalCostToday;
        }
        catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function cashPayment()
    {
        try {
            $today = Carbon::today(); // Get today's date
            $cashPayToday = Order::query()
                ->where('type', 'cash')
                ->whereDate('created_at', $today) // Assuming 'created_at' is the date column
                ->sum('net_total');
           return $cashPayToday;
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }
    }

    public function cardPayment()
    {
        try {
            $today = Carbon::today(); // Get today's date
            $cardPayToday = Order::query()
                ->where('type', 'card')
                ->whereDate('created_at', $today) // Assuming 'created_at' is the date column
                ->sum('net_total');
           return $cardPayToday;
        }
        catch (\Exception $exception){
            return $exception->getMessage();
        }
    }

    public function expencesToday()
    {
        try {
             $todayExpenses=Expense::query()
                 ->whereDate('date', today())
                 ->sum('amount');

             return $todayExpenses;
        }
        catch (\Exception $exception){

        }
    }
    public function members()
    {
        $user = Auth::user();
        return view('cashier.sidebar_pages.members', compact('user'));
    }

    public function cheque_list()
    {
        $user = Auth::user();
        return view('cashier.sidebar_pages.cheque.cheque_list', compact('user'));
    }

    public function add_cheque()
    {
        $user = Auth::user();
        return view('cashier.sidebar_pages.cheque.add_cheque', compact('user'));
    }

    public function view_cheque()
    {
        $user = Auth::user();
        return view('cashier.sidebar_pages.cheque.view_cheque', compact('user'));
    }

    public function edit_cheque()
    {
        $user = Auth::user();
        return view('cashier.sidebar_pages.cheque.edit_cheque', compact('user'));
    }

    public function purchase()
    {
//        $user=Auth::user();
        return view('cashier.purchase_cashier');
    }

}
