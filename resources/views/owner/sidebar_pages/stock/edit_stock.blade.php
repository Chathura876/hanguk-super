@extends('owner.app')

@section('content')
    <div class="p-6 space-y-6">
        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Edit Stock</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Edit Stock
                </li>
            </ol>
        </div>
        <div class="border border-default-200 rounded-lg">
            <div class="p-5 border-t border-dashed border-default-200">
                <form action="{{ route('stock.update', $stock->id) }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="grid lg:grid-cols-2 gap-6 mb-6">

                        <!-- Product Name -->
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="product_id">Product Name</label>
                            <select id="product_id" name="item_id" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50">
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ $product->id == $stock->item_id ? 'selected' : '' }}>
                                        {{ $product->product_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Quantity -->
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="qty">Quantity</label>
                            <input id="qty" name="qty" value="{{ old('qty', $stock->qty) }}" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Quantity">
                        </div>

                        <!-- From Item to To Item -->
                        <div class="flex items-center">
                            <div class="w-full">
                                <label class="block text-sm font-medium text-default-900 mb-2" for="from_item">Free Item</label>
                                <input id="from_item" value="{{ old('from_item', $stock->from_item) }}" name="from_item" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="quantity">
                            </div>

                            <span class="mx-4 text-default-900">to</span>

                            <div class="w-full">
                                <label class="block text-sm font-medium text-default-900 mb-2" for="to_item">To Item</label>
                                <input id="to_item" value="{{ old('to_item', $stock->to_item) }}" name="to_item" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="quantity">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="to_item">Unit Type</label>
                            <select name="unit_type" class="select-dropdown block w-full bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 sm:text-sm pl-4 pr-8 py-2">
                                <option value="" {{ old('unit_type', $stock->unit ?? '') == '' ? 'selected' : '' }}>Select Unit Type</option>
                                <option value="pcs" {{ old('unit_type', $stock->unit ?? '') == 'pcs' ? 'selected' : '' }}>Piece (pcs)</option>
                                <option value="kg" {{ old('unit_type', $stock->unit ?? '') == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                                <option value="g" {{ old('unit_type', $stock->unit ?? '') == 'g' ? 'selected' : '' }}>Gram (g)</option>
                                <option value="ltr" {{ old('unit_type', $stock->unit ?? '') == 'ltr' ? 'selected' : '' }}>Liter (ltr)</option>
                                <option value="ml" {{ old('unit_type', $stock->unit ?? '') == 'ml' ? 'selected' : '' }}>Milliliter (ml)</option>
                            </select>
                            @error('unit_type')
                            <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>


                        <!-- Stock Price -->
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="stock_price">Stock Price</label>
                            <input id="stock_price" name="stock_price" value="{{ old('stock_price', $stock->stock_price) }}" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Stock Price">
                        </div>

                        <!-- Selling Price -->
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="selling_price">Selling Price</label>
                            <input id="selling_price" name="selling_price" value="{{ old('selling_price', $stock->selling_price) }}" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Selling Price">
                        </div>

                        <!-- Discount Price -->
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="discount_price">Discount Price</label>
                            <input id="discount_price" name="discount_price" value="{{ old('discount_price', $stock->discount_price) }}" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Discount Price">
                        </div>

                    </div>

                    <div class="flex justify-end gap-4">
                        <button type="submit" class="flex items-center justify-center gap-2 rounded-md bg-primary px-6 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-primary-500">
                            <i class="ti ti-device-floppy text-lg"></i>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection
