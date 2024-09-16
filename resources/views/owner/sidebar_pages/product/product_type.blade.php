@extends('owner.app')
@section('content')

    <div class="p-6 space-y-6">

        <div class="p-6 space-y-6">
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


        <div class="flex w-full items-center justify-between">
            <h4 class="text-lg font-semibold text-default-900">Add Product Type</h4>
            <a href="{{ route('product-type.index') }}" class="rounded-md bg-primary/10 px-6 py-2.5 text-sm font-semibold text-primary hover:bg-primary hover:text-white">
                Back
            </a>
        </div>

        <div class="border border-default-200 rounded-lg">
            <div class="p-5 border-t border-dashed border-default-200">
                <form action="{{ route('product.type_create') }}" method="POST">
                    @csrf
                    <div class="grid lg:grid-cols-2 gap-6 mb-6">

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="product_type">Product Type</label>
                            <input id="product_type" name="type" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Product Type" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="description">Description</label>
                            <input id="description" name="description" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Description">
                        </div>

                    </div>

                    <div class="flex justify-end gap-4">
                        <button type="submit" class="flex items-center justify-center gap-2 rounded-md bg-primary px-6 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-primary-500">
                            <i class="ti ti-device-floppy text-lg"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
