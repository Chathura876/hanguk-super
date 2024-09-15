@extends('owner.app')
@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@1.39.1/tabler-icons.min.css">

    <style>
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background-color: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #cccccc; /* Gray scrollbar */
        }
    </style>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="p-6 space-y-6">
        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Add Product</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        GreenCart
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Products
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Add Product
                </li>
            </ol>
        </div>

        <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-4">
                @csrf
                <div class="grid lg:grid-cols-3 gap-6">
                    <div>
                        <div class="product-dropzone dropzone h-60 mb-6">
                            <input name="img" type="file" class="hidden" id="productImage">
                            <label for="productImage" class="dz-message needsclick w-full h-full flex flex-col items-center justify-center cursor-pointer">
                                <div class="mb-3">
                                    <i class="ti ti-photo-circle text-4xl text-primary"></i>
                                </div>
                                <h5 class="text-xl text-default-600">
                                    <i class="ti ti-cloud-upload text-lg text-default-600"></i> Upload Image.
                                </h5>
                                <p class="text-sm text-default-600 mb-2">Upload a cover image for your product (optional).</p>
                            </label>
                            @error('IMG')
                            <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="grid lg:grid-cols-2 gap-6 mb-6">
                            <div class="space-y-6">
                                <input name="product_name" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Product Name" value="{{ old('product_name') }}">
                                @error('product_name')
                                <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                                @enderror

                                <div class="relative w-64">
                                    <select name="category_id" class="select-dropdown block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm pl-4 pr-8 py-2">
                                        <option value="" selected>Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="relative w-64">
                                    <select name="sub_category_id" class="select-dropdown block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm pl-4 pr-8 py-2">
                                        <option value="" selected>Select Sub Category</option>
                                        @foreach($subCategories as $subCategory)
                                            <option value="{{ $subCategory->id }}" {{ old('sub_category_id') == $subCategory->id ? 'selected' : '' }}>{{ $subCategory->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('sub_category_id')
                                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="relative w-64">
                                    <select name="brand_id" class="select-dropdown block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm pl-4 pr-8 py-2">
                                        <option value="" selected>Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="grid lg:grid-cols-2 gap-6">
                                    <input name="bar_code" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Barcode" value="{{ old('bar_code') }}">
                                    @error('bar_code')
                                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                                    @enderror

{{--                                    <input name="shop_id" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Shop ID" value="{{ old('shop_id') }}">--}}
{{--                                    @error('shop_id')--}}
{{--                                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>--}}
{{--                                    @enderror--}}
                                </div>

                                <div class="relative w-64">
                                    <select name="type" class="select-dropdown block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm pl-4 pr-8 py-2">
                                        <option value="" selected>Select Type</option>
                                        @foreach($productTypes as $productType)
                                            <option value="{{ $productType->id }}" {{ old('type') == $productType->id ? 'selected' : '' }}>{{ $productType->type }}</option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <input name="sale_on_hare_price" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Price" value="{{ old('sale_on_hare_price') }}">
                                @error('sale_on_hare_price')
                                <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                                @enderror

                                <div class="flex items-center">
                                    <input name="enable_stock_group" id="enable_stock_group" type="checkbox" class="form-checkbox h-5 w-5 text-primary-600" value="1" {{ old('enable_stock_group') ? 'checked' : '' }}>
                                    <label for="enable_stock_group" class="ml-2 text-sm text-default-800">Enable Stock Group</label>
                                    @error('enable_stock_group')
                                    <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-3">
                        <div class="flex flex-wrap justify-end items-center gap-4">
                            <button type="submit" class="py-2.5 px-4 inline-flex rounded-lg text-sm font-medium bg-primary text-white transition-all hover:bg-primary-500">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
