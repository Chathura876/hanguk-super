@extends('owner.app')
@section('content')

    <div class="p-6 space-y-6">

        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Add Product Type</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Add Product Type
                </li>
            </ol>
        </div>
        <div class="border border-default-200 rounded-lg">
            <div class="p-5 border-t border-dashed border-default-200">
                <div class="grid lg:grid-cols-2 gap-6 mb-6">

                    <div>
                        <label class="block text-sm font-medium text-default-900 mb-2" for="product_type">Product Type</label>
                        <input id="product_type" name="product_type" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Product Type">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-default-900 mb-2" for="description">Description</label>
                        <input id="description" name="description" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Description">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-default-900 mb-2" for="added_by">Added By</label>
                        <div class="relative">
                            <select id="added_by" data-hs-select='{
                                    "placeholder": "Select Person",
                                    "toggleTag": "<button type=\"button\"></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 block w-full rounded py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border text-start border-default-200 dark:bg-default-50 focus:border-primary",
                                    "dropdownClasses": "mt-2 z-50 w-full max-h-[300px] p-1 space-y-0.5 bg-white border border-default-200 rounded-md overflow-hidden overflow-y-auto dark:bg-default-50",
                                    "optionClasses": "py-2 px-4 w-full text-sm text-default-800 cursor-pointer hover:bg-default-100 rounded focus:outline-none focus:bg-default-100",
                                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><i class=\"ti ti-checks shrink text-lg/none text-primary\" /></i></span></div>"
                                    }' class="hidden">
                                <option></option>
                                <option>Namal (Cashier)</option>
                            </select>


                            <div class="absolute top-1/2 end-3 -translate-y-1/2">
                                <i class="ti ti-arrows-move-vertical shrink text-sm text-default-600"></i>
                            </div>
                        </div>
                        {{--                        <input id="added_by" name="added_by" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Selling Price">--}}
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
