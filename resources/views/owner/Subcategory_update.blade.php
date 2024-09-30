@extends('owner.app')
@section('content')
    <!-- Start Content -->
    <div class="min-h-screen flex flex-col lg:ps-64 w-full">

        <div class="p-6 space-y-6">

            <div class="flex w-full items-center justify-between print:hidden">
                <h4 class="text-lg font-semibold text-default-900">Update Product</h4>

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
                <div class="px-6 py-4 flex items-center justify-between gap-4">
                    <h5 class="grow text-lg font-medium text-default-900">Total Sales</h5>
                    <div class="shrink hs-dropdown relative [--placement:bottom-right]">
                        <button type="button"
                                class="hs-dropdown-toggle h-8 w-8 inline-flex items-center justify-center bg-default-950/5 border border-default-200 rounded-full text-base focus:rotate-90 transition-all duration-500">
                            <i class="ti ti-dots-vertical"></i></button>

                        <div
                            class="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[180px] transition-[opacity,margin] mt-4 opacity-0 z-10 bg-white dark:bg-default-50 shadow-lg rounded-lg border border-default-100 p-1.5 hidden">
                            <ul class="flex flex-col gap-1">
                                <li>
                                    <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-400/10 rounded"
                                       href="#">Action</a>
                                </li>
                                <li>
                                    <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-400/10 rounded"
                                       href="#">Another Action</a>
                                </li>
                                <li>
                                    <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-400/10 rounded"
                                       href="#">Somthing else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="p-5 border-t border-dashed border-default-200">
                    <div class="grid lg:grid-cols-3 gap-6">
                        <div class="">
                            <form action="#" class="product-dropzone dropzone h-60 mb-6">
                                <div class="fallback">
                                    <input name="file" type="file" multiple="multiple">
                                </div>
                                <div class="dz-message needsclick w-full">
                                    <div class="mb-3">
                                        <i class="ti ti-photo-circle text-4xl text-primary"></i>
                                    </div>

                                    <h5 class="text-xl text-default-600"><i
                                            class="ti ti-cloud-upload text-lg text-default-600"></i> Upload Image.</h5>
                                    <p class="text-sm text-default-600 mb-2">Upload a cover image for your product.</p>
                                </div>
                            </form>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="grid lg:grid-cols-2 gap-6 mb-6">
                                <div class="space-y-6">
                                    <div>
                                        <input
                                            class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50"
                                            type="text" placeholder="Product Name">
                                    </div>

                                    <div class="relative">
                                        <select id="all-select-categories" data-hs-select='{
                                            "placeholder": "Select Type",
                                            "toggleTag": "<button type=\"button\"></button>",
                                            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 form-input block w-full rounded-md py-2.5 ps-4 pe-10 text-default-800 text-start text-sm focus:ring-transparent border-default-200 overflow-hidden focus:border-primary dark:bg-default-50 before:absolute before:inset-0 before:z-[1]",
                                            "dropdownClasses": "mt-2 z-50 w-full max-h-[300px] p-1.5 space-y-0.5 bg-white border border-default-200 rounded-md overflow-hidden overflow-y-auto dark:bg-default-50 [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-default-300",
                                            "optionClasses": "py-2 px-3 w-full text-sm text-default-800 cursor-pointer rounded-md hover:bg-default-100 focus:outline-none focus:bg-default-100",
                                            "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><i class=\"ti ti-checks text-lg flex-shrink-0 text-primary\" /></i></span></div>"
                                            }' class="hidden">
                                            <option></option>
                                            <option value="Apples">Apples</option>
                                            <option value="Bakery">Bakery</option>

                                        </select>


                                        <div class="absolute -inset-y-0 end-3 flex items-center">
                                            <i class="ti ti-selector shrink text-base/none text-default-500"></i>
                                        </div>
                                    </div>
                                    <!-- End Select -->

                                    <div class="grid lg:grid-cols-2 gap-6">
                                        <div>
                                            <input
                                                class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50"
                                                type="text" placeholder="barcode">
                                        </div>

                                        <div>
                                            <input
                                                class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50"
                                                type="text" placeholder="shop id">
                                        </div>
                                    </div>

                                    <div>
                                        <input
                                            class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50"
                                            type="number" placeholder="brand">
                                    </div>

                                    <div class="relative">
                                        <select id="all-select-categories" data-hs-select='{
                                            "placeholder": "Category",
                                            "toggleTag": "<button type=\"button\"></button>",
                                            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 form-input block w-full rounded-md py-2.5 ps-4 pe-10 text-default-800 text-start text-sm focus:ring-transparent border-default-200 overflow-hidden focus:border-primary dark:bg-default-50 before:absolute before:inset-0 before:z-[1]",
                                            "dropdownClasses": "mt-2 z-50 w-full max-h-[300px] p-1.5 space-y-0.5 bg-white border border-default-200 rounded-md overflow-hidden overflow-y-auto dark:bg-default-50 [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-default-300",
                                            "optionClasses": "py-2 px-3 w-full text-sm text-default-800 cursor-pointer rounded-md hover:bg-default-100 focus:outline-none focus:bg-default-100",
                                            "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><i class=\"ti ti-checks text-lg flex-shrink-0 text-primary\" /></i></span></div>"
                                            }' class="hidden">
                                            <option></option>
                                            <option value="delivery">Delivery</option>

                                        </select>


                                        <div class="absolute -inset-y-0 end-3 flex items-center">
                                            <i class="ti ti-selector shrink text-base/none text-default-500"></i>
                                        </div>
                                    </div>

                                    <div class="relative">
                                        <select id="all-select-categories" data-hs-select='{
                                            "placeholder": "Sub Category",
                                            "toggleTag": "<button type=\"button\"></button>",
                                            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 form-input block w-full rounded-md py-2.5 ps-4 pe-10 text-default-800 text-start text-sm focus:ring-transparent border-default-200 overflow-hidden focus:border-primary dark:bg-default-50 before:absolute before:inset-0 before:z-[1]",
                                            "dropdownClasses": "mt-2 z-50 w-full max-h-[300px] p-1.5 space-y-0.5 bg-white border border-default-200 rounded-md overflow-hidden overflow-y-auto dark:bg-default-50 [&::-webkit-scrollbar]:w-1 [&::-webkit-scrollbar-track]:bg-transparent [&::-webkit-scrollbar-thumb]:bg-default-300",
                                            "optionClasses": "py-2 px-3 w-full text-sm text-default-800 cursor-pointer rounded-md hover:bg-default-100 focus:outline-none focus:bg-default-100",
                                            "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><i class=\"ti ti-checks text-lg flex-shrink-0 text-primary\" /></i></span></div>"
                                            }' class="hidden">
                                            <option></option>
                                            <option value="delivery">Delivery</option>

                                        </select>


                                        <div class="absolute -inset-y-0 end-3 flex items-center">
                                            <i class="ti ti-selector shrink text-base/none text-default-500"></i>
                                        </div>
                                    </div>
                                    <!-- End Select -->

                                </div>

                            </div>
                        </div>

                        <div class="lg:col-span-3">
                            <div class="flex flex-wrap justify-end items-center gap-4">
                                <div class="flex flex-wrap items-center gap-4">
                                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                        <button type="button"
                                                class="hs-dropdown-toggle flex items-center gap-2 font-medium text-default-700 text-sm py-2.5 px-4 rounded-md bg-default-100 transition-all">
                                            Save as Draft <i data-lucide="chevron-down" class="h-4 w-4"></i>
                                        </button>

                                        <div
                                            class="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[200px] transition-[opacity,margin] mt-4 opacity-0 hidden z-20 bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-lg border border-default-100 p-1.5 dark:bg-default-50">
                                            <ul class="flex flex-col gap-1">
                                                <li>
                                                    <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded"
                                                       href="javascript:void(0)">Publish</a></li>
                                                <li>
                                                    <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded"
                                                       href="javascript:void(0)">Save as Darft</a></li>
                                                <li>
                                                    <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded"
                                                       href="javascript:void(0)">Discard</a></li>
                                            </ul><!-- end dropdown items -->
                                        </div><!-- end dropdown menu -->
                                    </div>
                                    <button
                                        class="py-2.5 px-4 inline-flex rounded-lg text-sm font-medium bg-primary text-white transition-all hover:bg-primary-500">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
