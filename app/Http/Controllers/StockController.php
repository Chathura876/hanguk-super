<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Request $request)
    {
        try {
            $search = $request->input('search');

            // Start the query with eager loading of the related product
            $query = Stock::with('product');

            // Apply search filter if provided
            if ($search !== null) {
                $query->where('id', 'like', '%' . $search . '%');
            }

            // Paginate the results
            $stock = $query->paginate(15);

            // Pass the data to the view
            return view('owner.sidebar_pages.stock.stock_list', compact('stock'));
        } catch (\Exception $exception) {
            // Return or handle the exception properly
            return $exception;
        }
    }


    public function create()
    {
        $products = Product::all();
        $stock=Product::all();
        return view('owner.sidebar_pages.stock.add_stock',compact('stock','products'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'item_id' => 'required|integer',
                'qty' => 'required|numeric',
                'stock_price' => 'required|numeric',
                'selling_price' => 'required|numeric',
                'discount_price' => 'nullable|numeric',
                'free_item' => 'nullable|numeric'
            ]);

            // Create a new stock record
            Stock::query()->create([
                'item_id' => $request->item_id,
                'qty' => $request->qty,
                'stock_price' => $request->stock_price,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'free_item' => $request->free_item
            ]);

            return redirect()->route('stock.index')->with('success', 'Stock added successfully.');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'An error occurred: ' . $exception->getMessage());
        }
    }


    public function edit($id)
    {
        try {
            $stock=Stock::query()
                ->where('id',$id)
                ->first();
            $products = Product::all();
            return view('owner.sidebar_pages.stock.edit_stock',compact('stock','products'));
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function update(Request $request,$id)
    {
        try {
            Stock::query()
                ->where('id',$id)
                ->update([
                    'item_id'=>$request->item_id,
                    'qty'=>$request->qty,
                    'stock_price'=>$request->stock_price,
                    'selling_price'=>$request->selling_price,
                    'discount_price'=>$request->discount_price,
                    'free_item'=>$request->free_item
                ]);
            return redirect()->route('stock.index');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function delete($id)
    {
        try {
            Stock::query()
                ->where('id',$id)
                ->delete();

            return redirect()->route('stock.index');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function show($id)
    {
        try {
            $stock=Stock::query()
                ->where('id',$id)
                ->first();
            return response()->json($stock);
        }
        catch (\Exception $exception){
            return $exception;
        }
    }


    public function stokeUpdateWithOrder($stock_id,$qty)
    {
        try {
            $product=Stock::query()
                ->where('id',$stock_id)
                ->first();

            $old_qty = $product->qty;
            $new_qty=$old_qty-$qty;

            Stock::query()
                ->where('id',$product->id)
                ->update([
                    'qty'=>$new_qty
                ]);

            return response()->json('success',200);
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function report()
    {
        return view('owner.sidebar_pages.stock.stock_report');
    }
}
