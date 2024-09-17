<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductTypeController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $productTypes = ProductType::all();
        return view('owner.sidebar_pages.product.product_type_index', compact('productTypes','user'));
    }
    public function type_create()
    {
        $user = Auth::user();
        return view('owner.sidebar_pages.product.product_type', compact('user'));
    }

    public function store_type(Request $request)
    {

        try {
            // Validate the request
//            $request->validate([
//                'type' => 'required|string|max:255',
//                'Description' => 'nullable|string|max:255',
//            ]);


            // Create the new ProductType record
            ProductType::query()-> create([
                'type' => $request->type,
                'Description' => $request->description,
            ]);


            // Redirect with success message
            return redirect()->route('product-type.index');
        } catch (\Exception $e) {
            return redirect()->route('product.type_create')->with('error', 'An error occurred while adding the product type.');
        }
    }


    public function edit($id)
    {
        $productType = ProductType::find($id);
        $user=Auth::user();
        return view('owner.sidebar_pages.product.product_type_edit', compact('user','productType'));
    }

    public function update(Request $request, ProductType $productType)
    {
        try {
            $request->validate([
                'type' => 'required|string|max:255',
                'description' => 'nullable|string|max:255',
            ]);

            $productType->update([
                'type' => $request->type,
                'Description' => $request->description,
            ]);

            return redirect()->route('product-type.index')->with('success', 'Product Type updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('product-type.index')->with('error', 'An error occurred while updating the product type.');
        }
    }

    public function destroy(ProductType $productType)
    {
        $productType->delete();
        return redirect()->route('product-type.index')->with('success', 'Product Type deleted successfully.');
    }


}
