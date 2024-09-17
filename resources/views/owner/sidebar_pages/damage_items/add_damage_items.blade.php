@extends('owner.app')
@section('content')

    <div class="p-6 space-y-6">
        {{-- Success/Error message --}}
        @if (session('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg" role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif
        @if (session('error'))
            <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-lg" role="alert">
                <span class="font-medium">{{ session('error') }}</span>
            </div>
        @endif

        {{-- Page title and back button --}}
        <div class="flex w-full items-center justify-between">
            <h4 class="text-lg font-semibold text-default-900">{{ isset($damageItem) ? 'Edit Damage Item' : 'Add Damage Item' }}</h4>
            <a href="{{ route('damage_items.index') }}" class="rounded-md bg-primary/10 px-6 py-2.5 text-sm font-semibold text-primary hover:bg-primary hover:text-white">
                Back
            </a>
        </div>

        {{-- Form --}}
        <div class="border border-default-200 rounded-lg">
            <div class="p-5 border-t border-dashed border-default-200">
                <form action="{{ isset($damageItem) ? route('damage_items.update', $damageItem->id) : route('damage_items.create') }}" method="POST">
                    @csrf
                    @if(isset($damageItem))
                        @method('PUT')
                    @endif

                    <div class="grid lg:grid-cols-2 gap-6 mb-6">
                        {{-- Product ID Field --}}
{{--                        <div>--}}
{{--                            <label class="block text-sm font-medium text-default-900 mb-2" for="product_id">Product</label>--}}
{{--                            <select id="product_id" name="product_id" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" required>--}}
{{--                                <!-- Assuming you have a list of products -->--}}
{{--                                @foreach($products as $product)--}}
{{--                                    <option value="{{ $product->id }}" {{ old('product_id', $damageItem->product_id ?? '') == $product->id ? 'selected' : '' }}>--}}
{{--                                        {{ $product->name }}--}}
{{--                                    </option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                            @error('product_id')--}}
{{--                            <span class="text-red-500 text-sm">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

                        {{-- Stock ID Field --}}
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="stock_id">Stock</label>
                            <select id="stock_id" name="stock_id" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" required>
                                <!-- Assuming you have a list of stocks -->
                                @foreach($stocks as $stock)
                                    <option value="{{ $stock->id }}" {{ old('stock_id', $damageItem->stock_id ?? '') == $stock->id ? 'selected' : '' }}>
                                        {{ $stock->id }}
                                    </option>
                                @endforeach
                            </select>
                            @error('stock_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Product Name Field --}}
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="product_name">Product Name</label>
                            <input id="product_name" name="product_name" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Product Name" value="{{ old('product_name', $damageItem->product_name ?? '') }}" required>
                            @error('product_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Date Field --}}
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="date">Date</label>
                            <input id="date" name="date" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="date" value="{{ old('date', $damageItem->date ?? '') }}" required>
                            @error('date')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Quantity Field --}}
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="quantity">Quantity</label>
                            <input id="quantity" name="quantity" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="number" min="1" value="{{ old('quantity', $damageItem->quantity ?? '') }}" required>
                            @error('quantity')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Added By Field --}}
{{--                        <div>--}}
{{--                            <label class="block text-sm font-medium text-default-900 mb-2" for="added_by">Added By</label>--}}
{{--                            <input id="added_by" name="added_by" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Added By" value="{{ old('added_by', $damageItem->added_by ?? '') }}" required>--}}
{{--                            @error('added_by')--}}
{{--                            <span class="text-red-500 text-sm">{{ $message }}</span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

                    </div>

                    {{-- Submit Button --}}
                    <div class="flex justify-end gap-4">
                        <button type="submit" class="flex items-center justify-center gap-2 rounded-md bg-primary px-6 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-primary-500">
                            <i class="ti ti-device-floppy text-lg"></i> {{ isset($damageItem) ? 'Update' : 'Save' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
