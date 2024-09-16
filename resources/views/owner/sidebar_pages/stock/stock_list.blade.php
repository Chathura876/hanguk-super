@extends('owner.app')

@section('content')
    <div class="p-6 space-y-6">
        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Stock List</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Stock List
                </li>
            </ol>
        </div>
        <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">
            <div class="flex flex-wrap items-center justify-between py-4 px-5">
                <div class="relative lg:flex hidden">
                    <input type="search" class="ps-12 pe-4 py-2.5 block w-64 bg-default-50/0 text-default-600 border-default-200 rounded-lg text-sm focus:border-primary focus:ring-primary" placeholder="Search...">
                    <span class="absolute start-4 top-2.5">
                        <i class="ti ti-search text-lg/none"></i>
                    </span>
                </div>
                <div class="flex flex-wrap items-center gap-2">
                    <div class="relative">
                        <select id="all-select-categories" data-hs-select='{
                                "placeholder": "Filter Options",
                                "toggleTag": "<button type=\"button\"></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 form-input block w-full rounded py-2.5 ps-4 pe-10 text-default-800 text-sm focus:ring-transparent border-0 bg-default-100 before:absolute before:inset-0 before:z-[1]",
                                "dropdownClasses": "mt-2 z-50 min-w-[200px] max-h-[300px] p-1.5 space-y-0.5 bg-white border border-default-200 rounded-lg overflow-hidden overflow-y-auto dark:bg-default-50",
                                "optionClasses": "py-2 px-3 w-full text-sm text-default-800 cursor-pointer rounded-md hover:bg-default-100 focus:outline-none focus:bg-default-100",
                                "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><i class=\"ti ti-checks text-lg flex-shrink-0 text-primary\" /></i></span></div>"
                                }' class="hidden">
                            <option></option>
                            <option selected="">Brand</option>
                            {{--                            <option>Refund</option>--}}
                            {{--                            <option>Paid</option>--}}
                            <option>Brand Names</option>
                        </select>


                        <div class="absolute -inset-y-0 end-3 flex items-center">
                            <i class="ti ti-selector shrink text-base/none text-default-500"></i>
                        </div>
                    </div><!-- End Select -->

                    <div class="relative">
                        <input type="date">
                    </div><!-- end relative -->

                    <a href="{{ route('stock.report') }}" class="relative overflow-hidden py-2.5 pe-6 ps-12 inline-flex items-center justify-center font-semibold align-middle duration-500 text-sm text-center bg-primary-600 text-white rounded-full hover:bg-primary-700">
                        <span class="absolute top-1/2 -translate-y-1/2 start-0 h-full w-10 rounded-full inline-flex items-center justify-center bg-white/20 text-white me-3"><i class="ti ti-report text-xl"></i></span>
                        Report
                    </a>
                    <a href="{{ route("stock.create") }}" class="relative overflow-hidden py-2.5 pe-6 ps-12 inline-flex items-center justify-center font-semibold align-middle duration-500 text-sm text-center bg-primary-600 text-white rounded-full hover:bg-primary-700">
                        <span class="absolute top-1/2 -translate-y-1/2 start-0 h-full w-10 rounded-full inline-flex items-center justify-center bg-white/20 text-white me-3"><i class="ti ti-circle-plus text-xl"></i></span>
                        Add Stock
                    </a>
                </div>
                <!-- Add your search and filter UI here -->
                <!-- Example: search input, date picker, etc. -->
            </div>

            <div class="border-t border-dashed border-default-200 relative overflow-x-auto">
                <table class="min-w-full">
                    <thead class="border-b border-dashed border-default-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-start min-w-4">
                            <input type="checkbox"
                                   class="form-checkbox transition-all duration-100 ease-in-out border-default-200 cursor-pointer rounded text-primary bg-default-50 focus:ring-transparent focus:ring-offset-0">
                        </th>
{{--                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">--}}
{{--                            Product Image--}}
{{--                        </th>--}}
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">
                            Product Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">
                            Free Item
                        </th>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">
                            Stock Price (Rs.)
                        </th>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">
                            Selling Price (Rs.)
                        </th>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">
                            Discount Price (Rs.)
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-center text-sm capitalize font-semibold text-default-900 min-w-32">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-default-200">
                    @foreach ($stock as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox"
                                       class="form-checkbox transition-all duration-100 ease-in-out border-default-200 cursor-pointer rounded text-primary bg-default-50 focus:ring-transparent focus:ring-offset-0">
                            </td>
{{--                            <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">--}}
{{--                              <span class="flex items-center gap-2">--}}
{{--                                  <span class="h-8 w-8 inline-flex items-center justify-center rounded-full">--}}
{{--                                      @if ($item->product && $item->product->image)--}}
{{--                                          <img src="{{ asset('storage/' . $item->product->image) }}"--}}
{{--                                               alt="{{ $item->product->product_name }}"--}}
{{--                                               class="max-w-full h-full rounded-full">--}}
{{--                                      @else--}}
{{--                                          <img src="{{ asset('Hanguk_super/assets/IMG/logo/logo_fav_02.png') }}"--}}
{{--                                               alt="default image"--}}
{{--                                               class="max-w-full h-full rounded-full">--}}
{{--                                      @endif--}}
{{--                                  </span>--}}
{{--                              </span>--}}
{{--                            </td>--}}
                            <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">
                                {{ $item->product ? $item->product->product_name : 'N/A' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">{{ $item->qty }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">{{ $item->free_item }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">{{ $item->stock_price }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">{{ $item->selling_price }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">{{ $item->discount_price }}</td>
                            <td class="whitespace-nowrap py-3 px-3 text-center text-sm font-medium">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- Edit Button -->
                                    <a href="{{ route('stock.edit', $item->id) }}"
                                       class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-default-100 border border-default-200 text-default-900 transition-all duration-200 hover:border-primary hover:bg-primary hover:text-white">
                                        <i class="ti ti-edit text-lg"></i>
                                    </a>

                                    <!-- Delete Button -->
                                    <form style="padding-top: 10px" action="{{ route('stock.delete', $item->id) }}" method="GET" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        <button type="submit"
                                                class=" inline-flex items-center justify-center h-9 w-9 rounded-full bg-default-100 border border-default-200 text-default-900 transition-all duration-200 hover:border-primary hover:bg-primary hover:text-white">
                                            <i class="ti ti-trash text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="flex items-center justify-between py-3 px-6 border-t border-dashed border-default-200">
                <h6 class="text-default-600">Showing {{ $stock->firstItem() }} to {{ $stock->lastItem() }}
                    of {{ $stock->total() }}</h6>

                <nav class="flex items-center gap-1">
                    {{ $stock->links() }}
                </nav>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('all-select-categories').addEventListener('change', function() {
            // Get the dropdown wrapper
            var dropdown = this.closest('.relative');

            // Find and hide the dropdown
            var dropdownMenu = dropdown.querySelector('[data-hs-select]');
            dropdownMenu.classList.add('hidden'); // Add hidden class to close the dropdown
        });

    </script>
@endsection
