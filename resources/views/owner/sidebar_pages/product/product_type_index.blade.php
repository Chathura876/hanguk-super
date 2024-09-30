@extends('owner.app')
@section('content')
    <div class="p-6 space-y-6">

            {{-- Success message --}}
            @if (session('success'))
                <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg" role="alert">
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            {{-- Error message --}}
            @if (session('error'))
                <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-lg" role="alert">
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            @endif

            {{-- Page title and back button --}}
            <div class="flex w-full items-center justify-between">
                <h4 class="text-lg font-semibold text-default-900">Update Product Type</h4>
                <a href="{{ route('product-type.index') }}" class="rounded-md bg-primary/10 px-6 py-2.5 text-sm font-semibold text-primary hover:bg-primary hover:text-white">
                    Back
                </a>
            </div>

        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Product List</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary"
                       href="javascript:void(0)">
                        hanguk super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary"
                       href="javascript:void(0)">
                        Product
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Product List
                </li>
            </ol>
        </div>

        <div class="grid xl:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-6">
            <!-- Summary Cards (All Products, New Products, etc.) -->
            <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">
                <div class="p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-base font-semibold text-default-600">All Product Types</p>
                            <h4 class="text-2xl font-semibold text-default-900 mt-4">{{ $productTypes->count() }}</h4>
                        </div>
                        <span
                            class="shrink h-18 w-18 inline-flex items-center justify-center rounded-lg bg-blue-500/20 text-blue-500">
                            <i class="ti ti-box text-4xl"></i>
                        </span>
                    </div>
                </div>
            </div>
            <!-- Add more summary cards as needed -->
        </div>

        <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">
            <div class="flex flex-wrap items-center justify-between py-4 px-5">
                {{--                <form method="POST" class="relative lg:flex hidden">--}}

                <input type="text" name="search"
                       class="ps-12 pe-4 py-2.5 block w-64 bg-default-50/0 text-default-600 border-default-200
                           rounded-lg text-sm focus:border-primary focus:ring-primary"
                       placeholder="Search..."
                       id="searchBox"
                       oninput="searchProduct()"
                >
                <span class="absolute start-4 top-2.5">
                        <i class="ti ti-search text-lg/none"></i>
                    </span>

                {{--                </form>--}}
                <a href="{{ route('product.type') }}"
                   class="relative overflow-hidden py-2.5 pe-6 ps-12 inline-flex items-center justify-center font-semibold align-middle duration-500 text-sm text-center bg-primary-600 text-white rounded-full hover:bg-primary-700">
                    <span
                        class="absolute top-1/2 -translate-y-1/2 start-0 h-full w-10 rounded-full inline-flex items-center justify-center bg-white/20 text-white me-3">
                        <i class="ti ti-circle-plus text-xl"></i>
                    </span>
                    Add Product Type
                </a>
            </div>

            <div class="border-t border-dashed border-default-200 relative overflow-x-auto">
                <table class="min-w-full" id="productTable">
                    <thead class="border-b border-dashed border-default-200">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-start text-base capitalize font-semibold text-default-900 min-w-32">
                            type
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-start text-base capitalize font-semibold text-default-900 min-w-32">
                            Description
                        </th>
                        <th scope="col"
                            class="px-3 py-3 text-center text-base capitalize font-semibold text-default-900 min-w-32">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-dashed divide-default-200">
                    @foreach($productTypes as $productType)
                        <tr>
                            <td class="px-6 py-3 text-default-900 font-medium whitespace-nowrap">{{ $productType->type }}</td>
                            <td class="px-6 py-3 text-default-900 font-medium whitespace-nowrap">{{ $productType->description }}</td>

                            <td class="whitespace-nowrap py-3 px-3 text-center text-sm font-medium">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('product-type.edit', ['id' => $productType->id]) }}"
                                       class="inline-flex items-center justify-center h-9 w-9 rounded-full
                                           bg-default-100 border border-default-200 text-default-900 transition-all
                                           duration-200 hover:border-primary hover:bg-primary hover:text-white">
                                        <i class="ti ti-edit-circle text-base"></i>
                                    </a>

                                    <!-- Delete Button -->
                                    <a href="{{ route('product-type.delete', ['id' => $productType->id]) }}"
                                       class="btn inline-flex items-center justify-center h-9 w-9 rounded-full
                                           bg-default-100 border border-default-200 text-default-900 transition-all
                                           duration-200 hover:border-primary hover:bg-primary hover:text-white">
                                        <i class="ti ti-trash text-lg"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
@endsection
@push('script')
    <!-- Load jQuery first -->
    <script src="{{asset('Hanguk_super/assets/JS/jquary/jquery-3.7.1.min.JS')}}"></script>

    <!-- Your custom JavaScript -->
    <script>
        function searchProduct() {

            let name = $('#searchBox').val();

            $.ajax({
                url: "{{ route('product.search') }}",
                type: 'POST',
                data: {
                    search: name,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    let tbody = $('#productTable tbody');
                    tbody.empty();

                    response.forEach(product => {
                        let row = `
                        <tr>
                            <td class="px-6 py-3">
                                <input type="checkbox" class="form-checkbox transition-all duration-100 ease-in-out border-default-200 cursor-pointer rounded text-primary bg-default-50 focus:ring-transparent focus:ring-offset-0">
                            </td>
                            <td class="px-6 py-3 text-default-900 font-semibold whitespace-nowrap">
                                <span class="h-10 w-10 inline-flex items-center justify-center rounded-full">
                                    <img src="{{ asset('storage/') }}/${product.image.replace('public/', '')}" alt="${product.product_name}" class="max-w-full h-full rounded-full">
                                </span>
                            </td>
                            <td class="px-6 py-3 text-default-900 font-medium whitespace-nowrap">${product.product_name}</td>
                            <td class="px-6 py-3 text-default-900 font-medium whitespace-nowrap">${product.bar_code}</td>
                            <td class="px-6 py-3 text-default-900 font-medium whitespace-nowrap">${product.shop_id}</td>
                            <td class="px-6 py-3 text-default-900 font-medium whitespace-nowrap">${product.brand_id}</td>
                            <td class="px-6 py-3 text-default-600 font-medium whitespace-nowrap">${product.sale_on_hare_price}</td>
                            <td class="px-6 py-3 text-default-600 font-medium whitespace-nowrap">
                                <input type="checkbox" disabled ${product.enable_stock_group ? 'checked' : ''}>
                            </td>
                            <td class="whitespace-nowrap py-3 px-3 text-center text-sm font-medium">
                                <div class="flex items-center justify-center gap-2">
                                    <button type="button" class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-default-100 border border-default-200 text-default-900 transition-all duration-200 hover:border-primary hover:bg-primary hover:text-white">
                                        <i class="ti ti-eye text-lg"></i>
                                    </button>
                                    <!-- Example of how to dynamically set href with product id -->
                                    <a href="{{ url('product/edit') }}/${product.id}" class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-default-100 border border-default-200 text-default-900 transition-all duration-200 hover:border-primary hover:bg-primary hover:text-white">
                                        <i class="ti ti-edit-circle text-base"></i>
                                    </a>
                                    <a href="{{ url('product/delete') }}/${product.id}" class="btn inline-flex items-center justify-center h-9 w-9 rounded-full bg-default-100 border border-default-200 text-default-900 transition-all duration-200 hover:border-primary hover:bg-primary hover:text-white">
                                        <i class="ti ti-trash text-lg"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    `;
                        tbody.append(row);
                    });
                },
                error: function(xhr) {
                    console.error('Error fetching data:', xhr);
                }
            });
        }
    </script>
@endpush
