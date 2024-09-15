<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Imageuploader;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Stock;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Modules\SuperMarketPos\Entities\Sub_category;
use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search', '');

        $product = Product::query()
            ->when($search, function ($query, $search) {
                return $query->where('product_name', 'like', '%' . $search . '%')
                    ->orWhere('bar_code', 'like', '%' . $search . '%');
            })
            ->paginate(10);

        return view('owner.product', compact('product'));
    }

    public function create()
    {
        try {
            $categories = Category::all();
            $subCategories = SubCategory::all();
            $brands = Brand::all();
            $productTypes = ProductType::all();

            return view('owner.product_add', compact(
                'categories',
                'subCategories',
                'brands',
                'productTypes'
            ));
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'bar_code' => 'required|string|max:255',
            'type' => 'required|integer',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'sale_on_hare_price' => 'nullable|numeric',
            'enable_stock_group' => 'nullable|boolean',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageController = new Imageuploader();
        $imagePath = $request->hasFile('img')
            ? $imageController->imgUpload($request->file('img'), 'product_image_', 'product')
            : null;

        try {
            $product=Product::query()->create([
                'product_name' => $request->input('product_name'),
                'bar_code' => $request->input('bar_code'),
                'shop_id' => $request->input('shop_id', 1),
                'type' => $request->input('type'),
                'image' => $imagePath,
                'brand_id' => $request->input('brand_id'),
                'category_id' => $request->input('category_id'),
                'sub_category_id' => $request->input('sub_category_id'),
                'add_by' => 'owner',
                'sale_on_hare_price' => $request->input('sale_on_hare_price'),
                'enable_stock_group' => $request->input('enable_stock_group')
            ]);

               $this->stockStore($request,$product);

            return redirect()->back()->with('success', 'Data saved successfully');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function stockStore($request,$product)
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
                'item_id' => $product->id,
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

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'product_name' => 'required|string|max:255',
            'bar_code' => 'required|string|max:255',
            'shop_id' => 'required|integer',
            'type' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'brand_id' => 'required|integer',
            'category_id' => 'required|integer',
            'sub_category_id' => 'required|integer',
            'sale_on_hare_price' => 'nullable|numeric',
            'enable_stock_group' => 'nullable|boolean',
        ]);
//dd($request->all());
        try {
            // Find the product by ID
            $product = Product::findOrFail($id);

            // Default to existing image path
            $imagePath = $product->image;

            // Handle new image upload if provided
            if ($request->hasFile('img')) {
                $imageController = new Imageuploader();
                $imagePath = $imageController->imgUpload($request->img, 'product_image_', 'product');
            }

            // Update the product
            $product->update([
                'product_name' => $request->product_name,
                'bar_code' => $request->bar_code,
                'shop_id' => $request->shop_id,
                'type' => $request->type,
                'image' => $imagePath,
                'brand_id' => $request->brand_id,
                'category_id' => $request->category_id,
                'sub_category_id' => $request->sub_category_id,
                'add_by' => 'owner',
                'sale_on_hare_price' => $request->input('sale_on_hare_price'),
                'enable_stock_group' => $request->input('enable_stock_group', 0),
            ]);

            // Redirect with success message
            return redirect()->route('product.index')->with('success', 'Product updated successfully!');
        } catch (\Exception $exception) {
            // Optionally log the exception
            // Log::error('Failed to update product: ' . $exception->getMessage());

            // Redirect back with error message
            return back()->with('error', 'Failed to update product: ' . $exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            Product::query()
                ->where('id',$id)
                ->delete();
            return redirect()->route('product.index');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function edit($id)
    {
        // Fetch the product by ID
        $product = Product::findOrFail($id);

        // Fetch related data for dropdowns
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        $productTypes = ProductType::all();

        // Return the view with the product and related data
        return view('owner.product_update', compact('product', 'categories', 'subCategories', 'brands', 'productTypes'));
    }

    public function type()
    {
        return view('owner.sidebar_pages.product.product_type');
    }


//===========================================================================
//==========================Category===========================================
//=============================================================================

    public function category_index(Request $request)
    {
        $search = $request->input('search');

        if ($search === null) {
            $category=Category::all();
        } else {

            $category = Category::query()
                ->where('name', 'like', '%' . $search . '%')
                ->get();
        }

//        return response()->json($category);
        return view('owner.category',compact('category'));
    }

    public function category_edit($id)
    {
        return view('owner.category_update');
    }

    public  function category_create()
    {
        return view('owner.category_add');
    }

    public function category_store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'shop_id' => 'integer',
            ]);


            Category::query()->create([
                'name' => $request->input('name'),
                'shop_id' => $request->input('shop_id', 1),
            ]);

            return redirect()->back()->with('success', 'Category created successfully');
        } catch (\Exception $exception) {

            return redirect()->back()->with('error', 'Error creating category: ' . $exception->getMessage());
        }
    }

    public function category_update(Request $request,$id)
    {
        try {
            Category::query()
                ->where('id',$id)
                ->update([
                    'name'=>$request->name,
                    'shop_id'=>0
                ]);
            return response()->json('updated');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function category_delete($id)
    {
        try {
            Category::query()
                ->where('id',$id)
                ->delete();
//            return response()->json('deleted');
            return redirect()->back()->with('deleted', 'Category deleted successfully');
        }

        catch (\Exception $exception){
            return $exception;
        }
    }

//================================================================================
//===============================Sub Category======================================
//=================================================================================

    public function subcategory_index(Request $request)
    {
        $search = $request->input('search');

        if ($search === null) {
            $sub_category = SubCategory::all();
        } else {

            $sub_category = SubCategory::query()
                ->where('name', 'like', '%' . $search . '%')
                ->get();
        }
        return view('owner.Sub_category',compact('sub_category'));
    }

    public  function Sub_category_create()
    {
        $categories = Category::all();

        return view('owner.Sub_category_add',compact('categories'));
    }
    public function Sub_category_edit($id)
    {
        return view('owner.category_update');
    }
    public function subcategory_store(Request $request)
    {
        try {
            SubCategory::query()->create([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'shop_id' => 0
            ]);
            return redirect()->back()->with('success', 'Subcategory created successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'An error occurred: ' . $exception->getMessage());
        }
    }

    public function subcategory_update(Request $request,$id)
    {
        try {
          Category::query()
              ->where('id',$id)
              ->update([
                  'name'=>$request->name,
                  'category_id'=>$request->category_id,
                  'shop_id'=>0
              ]);
          return response()->json('updated');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }
    public function subcategory_show($id)
    {
        try {
            $sub_category=SubCategory::query()
                ->where('id',$id)
                ->first();

            return response()->json($sub_category);
        }
        catch (\Exception $exception){
            return $exception;
        }
    }
    public function subcategory_delete($id){
        try {
            SubCategory::query()
                ->where('id',$id)
                ->delete();
        return response()->json('deleted');
        }
        catch (\Exception $exception){
            return $exception;
        }
    }

    public function searchProduct(Request $request)
    {


        $searchTerm = $request->input('search');
        $products = Product::where('product_name', 'LIKE', '%' . $searchTerm . '%')->get();

        // Ensure the data is returned as JSON
        return response()->json($products);
    }





//================================================================================
//===============================Brand======================================
//=================================================================================

    public function brand_index(Request $request)
    {
        $search = $request->input('search', '');

        $brands = Brand::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('company', 'like', '%' . $search . '%');
            })
            ->paginate(10);
//dd($brands);
        return view('owner.brand', compact('brands'));
    }

    public function brand_create()
    {
        try {
            return view('owner.brand_add');
        } catch (\Exception $exception) {
            return back()->with('error', $exception->getMessage());
        }
    }

    public function brand_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageController = new Imageuploader();
        $imagePath = $request->hasFile('img')
            ? $imageController->imgUpload($request->file('img'), 'brand_image_', 'brand')
            : null;

        try {
            Brand::create([
                'name' => $request->input('name'),
                'Company' => $request->input('company'),
                'img' => $imagePath,
            ]);

            return redirect()->back()->with('success', 'Brand created successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    // Show the edit brand form
    public function brand_edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('supermarketpos::owner.brand_update', compact('brand'));
    }
    // Update brand details
    public function brand_update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $brand = Brand:: query()-> findOrFail($id);
        $imagePath = $brand->img;

        if ($request->hasFile('img')) {
            $imageController = new Imageuploader();
            $imagePath = $imageController->imgUpload($request->img, 'brand_image_', 'brand');
        }

        try {
            $brand->update([
                'name' => $request->input('name'),
                'Company' => $request->input('company'),
                'img' => $imagePath,
            ]);

            return redirect()->route('brand.index')->with('success', 'Brand updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update brand: ' . $e->getMessage());
        }
    }

    public function brand_delete($id)
    {
        try {
            Brand::query()-> findOrFail($id)->delete();
            return redirect()->route('brand.index')->with('success', 'Brand deleted successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete brand: ' . $e->getMessage());
        }
    }


}
