<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Damage_items;
use App\Models\Product;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

class DamageItemsController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $damageItems = Damage_items::all(); // Retrieve all damage items
        return view('owner.sidebar_pages.damage_items.damage_items_list', compact('damageItems','user'));
    }

    public function create()
    {
        $products = Product::all();
        $stocks = Stock::all();
        $user = Auth::user();
        return view('owner.sidebar_pages.damage_items.add_damage_items', compact('products','stocks','user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'stock_id' => 'required|exists:stocks,id',
            'product_name' => 'required|string|max:255',
            'date' => 'required|date',
            'quantity' => 'required|integer',
            'added_by' => 'required|string|max:255',
        ]);

        Damage_items::create([
            'product_id' => $request->product_id,
            'stock_id' => $request->stock_id,
            'product_name' => $request->product_name,
            'date' => $request->date,
            'quantity' => $request->quantity,
            'added_by' => $request->added_by,
        ]);

        return redirect()->route('damage-items.index')->with('success', 'Damage item added successfully.');
    }

    public function show($id)
    {
        $damageItem = Damage_items::findOrFail($id);
        return view('owner.sidebar_pages.damage_items.damage_item_show', compact('damageItem'));
    }

    public function edit($id)
    {
        $damageItem = Damage_items::findOrFail($id);
        return view('owner.sidebar_pages.damage_items.edit_damage_items', compact('damageItem'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'stock_id' => 'required|exists:stocks,id',
            'product_name' => 'required|string|max:255',
            'date' => 'required|date',
            'quantity' => 'required|integer',
            'added_by' => 'required|string|max:255',
        ]);

        $damageItem = Damage_items::findOrFail($id);
        $damageItem->update([
            'product_id' => $request->product_id,
            'stock_id' => $request->stock_id,
            'product_name' => $request->product_name,
            'date' => $request->date,
            'quantity' => $request->quantity,
            'added_by' => $request->added_by,
        ]);

        return redirect()->route('damage-items.index')->with('success', 'Damage item updated successfully.');
    }

    public function destroy($id)
    {
        $damageItem = Damage_items::findOrFail($id);
        $damageItem->delete();

        return redirect()->route('damage-items.index')->with('success', 'Damage item deleted successfully.');
    }
}
