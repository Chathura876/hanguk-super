<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Stock;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


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

                        if ($request->filled('barcode')) {
                            // Partial match for barcode
                            $query->orWhere('bar_code', 'LIKE', '%' . $request->barcode . '%');
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
    public function downloadReport($period)
    {
        $user = Auth::user();

        if ($period == 'daily') {
            $startDate = now()->startOfDay();
            $endDate = now()->endOfDay();
        } elseif ($period == 'weekly') {
            $startDate = now()->startOfWeek();
            $endDate = now()->endOfWeek();
        } elseif ($period == 'monthly') {
            $startDate = now()->startOfMonth();
            $endDate = now()->endOfMonth();
        }

        $stock = Stock::with('product')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->orderBy('id', 'desc')
            ->get();

        $pdf = Pdf::loadView('cashier.sidebar_pages.reports_pdf', compact('user', 'stock', 'startDate', 'endDate'));
        return $pdf->download("stock_report_{$period}.pdf");
    }

    public function reports()
    {
        $user = Auth::user();
        $stock = Stock::with('product')->get();

        return view('cashier.sidebar_pages.reports', compact('user', 'stock'));
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
