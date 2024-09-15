@extends('owner.app')
@section('content')

    <div class="p-6 space-y-6">

        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Add Damage Items</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Add Damage Items
                </li>
            </ol>
        </div>
        <div class="border border-default-200 rounded-lg">
            <div class="px-6 py-6 flex items-center justify-between gap-4">
                <div class="hidden lg:flex">
                    <label for="icon" class="sr-only">Search</label>
                    <div class="relative hidden lg:flex">
                        <input type="search" class="block rounded-full border-default-200 bg-default-50 py-2.5 pe-10 ps-12 text-sm text-default-800 focus:border-primary focus:ring-primary lg:w-64" placeholder="Search for products...">
                        <i class="ti ti-search absolute start-4 top-1/2 -translate-y-1/2 text-lg text-default-600"></i>
                    </div>
                </div>
            </div>
            <div class="p-5 border-t border-dashed border-default-200">
                <div class="grid lg:grid-cols-2 gap-6 mb-6">
                    <div class="border border-default-200 rounded-lg hover:border-primary duration-500">
                        <div class="p-8">
                            <div class="flex flex-col md:flex-row gap-4">
                                <div class="flex-shrink">
                                    <img alt="" class="h-40 w-40" src="{{asset("Hanguk_super/assets/img/fruit-59cd8491.png")}}">
                                </div><!-- end flex-shrink -->
                                <div class="flex-grow flex">
                                    <div class="flex-grow flex flex-col">
                                        <div class="shrink mb-2 mt-16">
                                            {{--                                            <br><br>--}}
                                            <p class="text-primary uppercase text-xs font-medium mb-0.5">Fruits</p>
                                            <h4 class="text-default-800 text-xl font-semibold">Banana </h4>
                                        </div>

                                    </div>

                                </div>
                            </div><!-- end flex -->
                        </div><!-- end p-6 -->
                    </div><!-- end card -->

                    <div>
                        <label class="block text-sm font-medium text-default-900 mb-2" for="qty"></label>
                        {{--                        <input id="qty" name="qty" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Product Name">--}}
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-default-900 mb-2" for="stock_id">Stock ID</label>
                        <select id="stock_id" data-hs-select='{
                                    "placeholder": "Select Stock ID",
                                    "toggleTag": "<button type=\"button\"></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 block w-full rounded py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border text-start border-default-200 dark:bg-default-50 focus:border-primary",
                                    "dropdownClasses": "mt-2 z-50 w-full max-h-[300px] p-1 space-y-0.5 bg-white border border-default-200 rounded-md overflow-hidden overflow-y-auto dark:bg-default-50",
                                    "optionClasses": "py-2 px-4 w-full text-sm text-default-800 cursor-pointer hover:bg-default-100 rounded focus:outline-none focus:bg-default-100",
                                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><i class=\"ti ti-checks shrink text-lg/none text-primary\" /></i></span></div>"
                                    }' class="hidden">
                            <option></option>
                            <option>stock_id</option>
                        </select></div>

                    <div>
                        <label class="block text-sm font-medium text-default-900 mb-2" for="qty">Quantity</label>
                        <input id="qty" name="free_item_qty" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Quantity">
                    </div>

                </div>

                <div class="flex justify-end gap-4">
                    <button class="flex items-center justify-center gap-2 rounded-md bg-primary/10 px-6 py-2.5 text-center text-sm font-semibold text-primary shadow-sm transition-all duration-200 hover:bg-primary hover:text-white">
                        <i class="ti ti-arrow-back-up text-lg"></i>
                        Undo
                    </button>
                    <button class="flex items-center justify-center gap-2 rounded-md bg-primary px-6 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-primary-500">
                        <i class="ti ti-device-floppy text-lg"></i>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection
