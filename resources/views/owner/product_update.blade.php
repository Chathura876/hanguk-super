@extends('owner.app')
@section('content')
    <div class="p-6 space-y-6">
        <h4 class="text-lg font-semibold text-default-900">Edit Product</h4>

        <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">
            <div class="p-6">
                <form method="POST" action="{{ route('product.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-6 grid-cols-1 md:grid-cols-2">
                        <!-- Product Name -->
                        <div>
                            <label for="product_name" class="block text-sm font-medium text-default-700">Product Name</label>
                            <input type="text" name="product_name" id="product_name" value="{{ old('product_name', $product->product_name) }}"
                                   class="mt-1 block w-full border border-default-300 rounded-lg px-3 py-2 text-default-900 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                            @error('product_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Bar Code -->
                        <div>
                            <label for="bar_code" class="block text-sm font-medium text-default-700">Bar Code</label>
                            <input type="text" name="bar_code" id="bar_code" value="{{ old('bar_code', $product->bar_code) }}"
                                   class="mt-1 block w-full border border-default-300 rounded-lg px-3 py-2 text-default-900 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                            @error('bar_code')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Shop ID -->
                        <div>
                            <label for="shop_id" class="block text-sm font-medium text-default-700">Shop ID</label>
                            <input type="text" name="shop_id" id="shop_id" value="{{ old('shop_id', $product->shop_id) }}"
                                   class="mt-1 block w-full border border-default-300 rounded-lg px-3 py-2 text-default-900 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                            @error('shop_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Type -->
                        <div>
                            <label for="type" class="block text-sm font-medium text-default-700">Type</label>
                            <select name="type" id="type" class="mt-1 block w-full border border-default-300 rounded-lg px-3 py-2 text-default-900 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                                @foreach($productTypes as $type)
                                    <option value="{{ $type->id }}" {{ old('type', $product->type) == $type->id ? 'selected' : '' }}>
                                        {{ $type->type }}
                                    </option>
                                @endforeach
                            </select>
                            @error('type')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Image -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-default-700">Image</label>
                            <input type="file" name="img" id="image"
                                   class="mt-1 block w-full border border-default-300 rounded-lg px-3 py-2 text-default-900 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                            @if ($product->image)
                                <img src="{{ asset($product->image) }}" alt="Product Image" class="mt-2 max-w-full h-auto">
                            @endif
                            @error('img')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Brand ID -->
                        <div>
                            <label for="brand_id" class="block text-sm font-medium text-default-700">Brand</label>
                            <select name="brand_id" id="brand_id" class="mt-1 block w-full border border-default-300 rounded-lg px-3 py-2 text-default-900 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Category ID -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-default-700">Category</label>
                            <select name="category_id" id="category_id" class="mt-1 block w-full border border-default-300 rounded-lg px-3 py-2 text-default-900 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Sub Category ID -->
                        <div>
                            <label for="sub_category_id" class="block text-sm font-medium text-default-700">Sub Category</label>
                            <select name="sub_category_id" id="sub_category_id" class="mt-1 block w-full border border-default-300 rounded-lg px-3 py-2 text-default-900 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                                @foreach($subCategories as $subCategory)
                                    <option value="{{ $subCategory->id }}" {{ old('sub_category_id', $product->sub_category_id) == $subCategory->id ? 'selected' : '' }}>
                                        {{ $subCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('sub_category_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Sale on Hare Price -->
                        <div>
                            <label for="sale_on_hare_price" class="block text-sm font-medium text-default-700">Sale on Hare Price</label>
                            <input type="text" name="sale_on_hare_price" id="sale_on_hare_price" value="{{ old('sale_on_hare_price', $product->sale_on_hare_price) }}"
                                   class="mt-1 block w-full border border-default-300 rounded-lg px-3 py-2 text-default-900 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                            @error('sale_on_hare_price')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Enable Stock Group -->
                        <div>
                            <label for="enable_stock_group" class="block text-sm font-medium text-default-700">Enable Stock Group</label>
                            <input type="checkbox" name="enable_stock_group" id="enable_stock_group"
                                   value="1" {{ old('enable_stock_group', $product->enable_stock_group) ? 'checked' : '' }}
                                   class="mt-1 block border border-default-300 rounded-lg px-3 py-2 text-default-900 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                        </div>

                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit"
                                class="inline-flex items-center justify-center h-9 px-4 rounded-full bg-primary-600 text-white font-semibold transition-all duration-200 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                            Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
