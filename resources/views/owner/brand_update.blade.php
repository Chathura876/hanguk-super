@extends('owner.app')
@section('content')
    <div class="p-6 space-y-6">
        <h4 class="text-lg font-semibold text-default-900">Edit Brand</h4>

        <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">
            <div class="p-6">
                <form method="POST" action="{{ route('brand.update', ['id' => $brand->id]) }}" enctype="multipart/form-data">
                    @csrf

                    <div class="grid gap-6 grid-cols-1 md:grid-cols-2">
                        <!-- Brand Name -->
                        <div>
                            <label for="brand_name" class="block text-sm font-medium text-default-700">Brand Name</label>
                            <input type="text" name="name" id="brand_name" value="{{ old('brand_name', $brand->name) }}"
                                   class="mt-1 block w-full border border-default-300 rounded-lg px-3 py-2 text-default-900 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                            @error('brand_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="company" class="block text-sm font-medium text-default-700">Company</label>
                            <input type="text" name="company" id="company" value="{{ old('company', $brand->Company) }}"
                                   class="mt-1 block w-full border border-default-300 rounded-lg px-3 py-2 text-default-900 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                            @error('brand_name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>


                        <!-- Brand Image -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-default-700">Brand Image</label>
                            <input type="file" name="img" id="image"
                                   class="mt-1 block w-full border border-default-300 rounded-lg px-3 py-2 text-default-900 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                            @if ($brand->image)
                                <img src="{{ asset($brand->image) }}" alt="Brand Image" class="mt-2 max-w-full h-auto">
                            @endif
                            @error('IMG')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>



                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit"
                                class="inline-flex items-center justify-center h-9 px-4 rounded-full bg-primary-600 text-white font-semibold transition-all duration-200 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                            Update Brand
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
