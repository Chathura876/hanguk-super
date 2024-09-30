@extends('owner.app')
@section('content')
    <!-- Start Content -->
    <div class="space-y-6 p-6">

        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Dashboard</h4>

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
                        Admin
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Dashboard
                </li>
            </ol>
        </div>
        <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-6">
            <div class="rounded-lg border border-default-200 bg-white dark:bg-default-50 overflow-hidden">
                <div class="p-5">
                    <div class="flex gap-4">
                        <div class="grow">
                            <h6 class="text-base font-medium text-default-600s">Orders</h6>
                            <h4 class="my-3 text-2xl font-semibold text-default-900">14.8K</h4>
                            <p class="text-sm font-medium text-primary"><i
                                    class="ti ti-trending-up text-base align-middle"></i> 50% Increase</p>
                        </div>
                        <div
                            class="shrink h-14 w-14 inline-flex items-center justify-center bg-blue-500/20 text-blue-500 rounded-md">
                            <i class="ti ti-shopping-bag text-3xl"></i>
                        </div>
                    </div>
                </div>
            </div><!-- end grid-col -->

            <div class="rounded-lg border border-default-200 bg-white dark:bg-default-50 overflow-hidden">
                <div class="p-5">
                    <div class="flex gap-4">
                        <div class="grow">
                            <h6 class="text-base font-medium text-default-600s">Total Products</h6>
                            <h4 class="my-3 text-2xl font-semibold text-default-900">996</h4>
                            <p class="text-sm font-medium text-red-500"><i
                                    class="ti ti-trending-down text-base align-middle"></i> 2% Decrease</p>
                        </div>
                        <div
                            class="shrink h-14 w-14 inline-flex items-center justify-center bg-primary/20 text-primary rounded-md">
                            <i class="ti ti-cheese text-3xl"></i>
                        </div>
                    </div>
                </div>
            </div><!-- end grid-col -->

            <div class="rounded-lg border border-default-200 bg-white dark:bg-default-50 overflow-hidden">
                <div class="p-5">
                    <div class="flex gap-4">
                        <div class="grow">
                            <h6 class="text-base font-medium text-default-600s">Total Customers</h6>
                            <h4 class="my-3 text-2xl font-semibold text-default-900">912.68K</h4>
                            <p class="text-sm font-medium text-primary"><i
                                    class="ti ti-trending-up text-base align-middle"></i> 50% Increase</p>
                        </div>
                        <div
                            class="shrink h-14 w-14 inline-flex items-center justify-center bg-yellow-500/20 text-yellow-500 rounded-md">
                            <i class="ti ti-users text-3xl"></i>
                        </div>
                    </div>
                </div>
            </div><!-- end grid-col -->

            <div class="rounded-lg border border-default-200 bg-white dark:bg-default-50 overflow-hidden">
                <div class="p-5">
                    <div class="flex gap-4">
                        <div class="grow">
                            <h6 class="text-base font-medium text-default-600s">Reviews</h6>
                            <h4 class="my-3 text-2xl font-semibold text-default-900">858.72K</h4>
                            <p class="text-sm font-medium text-primary"><i
                                    class="ti ti-trending-up text-base align-middle"></i> 44% Increase</p>
                        </div>
                        <div
                            class="shrink h-14 w-14 inline-flex items-center justify-center bg-cyan-500/20 text-cyan-500 rounded-md">
                            <i class="ti ti-star text-3xl"></i>
                        </div>
                    </div>
                </div>
            </div><!-- end grid-col -->
        </div><!-- end grid -->

        <div class="grid xl:grid-cols-3 gap-6">
            <div class="xl:col-span-2">
                <div class="rounded-lg border border-default-200 bg-white dark:bg-default-50">
                    <div class="px-6 py-4 flex items-center justify-between gap-4">
                        <h5 class="grow text-lg font-medium text-default-900">Revenue</h5>
                        <div class="relative">
                            <select id="all-select-categories" data-hs-select='{
                                "toggleTag": "<button type=\"button\"></button>",
                                "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 block w-full rounded-full py-2 ps-4 pe-10 text-default-900 text-sm focus:ring-transparent border border-default-200 transition-all duration-300 hover:bg-default-100 before:absolute before:inset-0 before:z-[1]",
                                "dropdownClasses": "mt-2 z-50 min-w-[200px] max-h-[300px] p-1.5 space-y-0.5 bg-white border border-default-200 rounded-lg overflow-hidden overflow-y-auto end-0 dark:bg-default-50",
                                "optionClasses": "py-2 px-3 w-full text-sm text-default-800 cursor-pointer rounded-md hover:bg-default-100 focus:outline-none focus:bg-default-100",
                                "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><i class=\"ti ti-checks text-lg flex-shrink-0 text-primary\" /></i></span></div>"
                                }' class="hidden">
                                <option>Today</option>
                                <option>Yesterday</option>
                                <option>Last 7 Days</option>
                                <option>Last 30 Days</option>
                                <option>This Month</option>
                                <option>Last Month</option>
                            </select>

                            <div class="absolute -inset-y-0 start-auto end-3 flex items-center">
                                <i class="ti ti-chevron-down shrink text-base/none"></i>
                            </div>
                        </div><!-- End Select -->
                    </div>
                    <div class="bg-default-100 px-5 py-3 border-y border-dashed border-default-200">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="text-center">
                                <div class="inline-flex items-center justify-center gap-2">
                                    <i class="ti ti-chart-bar text-base text-primary"></i>
                                    <p class="text-default-600 font-medium">Net Profit</p>
                                </div>
                                <h3 class="text-default-900 text-xl font-semibold mt-2">$41,512k</h3>
                            </div>
                            <div class="text-center">
                                <div class="inline-flex items-center justify-center gap-2">
                                    <i class="ti ti-playstation-circle text-base text-primary"></i>
                                    <p class="text-default-600 font-medium">Net Profit</p>
                                </div>
                                <h3 class="text-default-900 text-xl font-semibold mt-2">$41,512k</h3>
                            </div>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <div id="revenue_report" class="apex-charts"></div>
                    </div>
                </div>
            </div>

            <div class="rounded-lg border border-default-200 bg-white dark:bg-default-50 overflow-hidden">
                <div class="px-6 py-4 flex items-center justify-between gap-4">
                    <h5 class="grow text-lg font-medium text-default-900">Total Sales</h5>
                    <div class="shrink hs-dropdown relative [--placement:bottom-right] group">
                        <button type="button"
                                class="hs-dropdown-toggle h-8 w-8 inline-flex items-center justify-center bg-default-950/5 border border-default-200 rounded-full text-base group-[&.open]:rotate-90 transition-all duration-500">
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
                                       href="#">Something else here</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="p-5 border-t border-dashed border-default-200">
                    <div id="ana_device" class="apex-charts py-3.5"></div>
                </div>
                <div class="flex flex-col">
                    <div class="overflow-x-auto -mb-2">
                        <div class="inline-block min-w-full">
                            <div class="overflow-hidden">
                                <table class="min-w-full border-t border-dashed border-default-200">
                                    <tbody>
                                    <!-- Product 1 -->
                                    <tr class="bg-white border-b border-dashed border-default-200 dark:bg-default-50">
                                        <td class="px-2 py-2.5 text-sm font-medium text-default-900 whitespace-nowrap">
                                            Nuts & Berries
                                        </td>
                                        <td class="px-2 py-2.5 text-sm text-default-500 whitespace-nowrap">
                                            1843
                                        </td>
                                        <td class="px-2 py-2.5 text-sm text-default-500 whitespace-nowrap">
                                            -3
                                        </td>
                                        <td class="px-2 py-2.5 text-sm text-default-500 whitespace-nowrap">
                                            -12
                                        </td>
                                    </tr>
                                    <!-- Product 2 -->
                                    <tr class="bg-white border-b border-dashed border-default-200 dark:bg-default-50">
                                        <td class="px-2 py-2.5 text-sm font-medium text-default-900 whitespace-nowrap">
                                            Vegetables
                                        </td>
                                        <td class="px-2 py-2.5 text-sm text-default-500 whitespace-nowrap">
                                            2543
                                        </td>
                                        <td class="px-2 py-2.5 text-sm text-default-500 whitespace-nowrap">
                                            -5
                                        </td>
                                        <td class="px-2 py-2.5 text-sm text-default-500 whitespace-nowrap">
                                            -2
                                        </td>
                                    </tr>
                                    <!-- Product 2 -->
                                    <tr class="bg-white dark:bg-default-50">
                                        <td class="px-2 py-2.5 text-sm font-medium text-default-900 whitespace-nowrap">
                                            Fruits
                                        </td>
                                        <td class="px-2 py-2.5 text-sm text-default-500 whitespace-nowrap">
                                            3654
                                        </td>
                                        <td class="px-2 py-2.5 text-sm text-default-500 whitespace-nowrap">
                                            -5
                                        </td>
                                        <td class="px-2 py-2.5 text-sm text-default-500 whitespace-nowrap">
                                            -6
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end grid -->

        <div class="flex items-center justify-between gap-6">
            <h2 class="text-xl font-semibold text-default-900">Top Selling Products</h2>
            <a href="admin-product-list.html"
               class="py-[5px] px-4 inline-block font-semibold tracking-wide align-middle duration-500 text-sm text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded">View
                All <i class="ti ti-chevron-right"></i></a>
        </div>

        <div class="grid xl:grid-cols-6 md:grid-cols-2 grid-cols-1 gap-6">
            <div class="border border-default-200 rounded-lg">
                <div class="p-5 relative">
                    <div class="absolute top-4 end-4">
                        <a href="#"
                           class="inline-flex items-center justify-center bg-default-100 text-default-900 rounded-full h-10 w-10"><i
                                class="ti ti-shopping-cart text-lg"></i></a>
                    </div>

                    <div class="text-center">
                        <img src="assets/1-2ca96552.png" alt="" class="flex mx-auto my-4">
                        <h6 class="font-semibold text-xl text-default-900 mb-1">Banana</h6>
                        <h4 class="font-medium text-base text-primary mb-2">$14.99 <span
                                class="text-default-600 text-sm line-through">$20.99</span></h4>
                    </div>

                    <div class="flex items-center justify-center gap-2">
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-half-filled text-lg text-yellow-400"></i></button>
                    </div>
                </div>
            </div><!-- end grid-cols -->

            <div class="border border-default-200 rounded-lg">
                <div class="p-5 relative">
                    <div class="absolute top-4 end-4">
                        <a href="#"
                           class="inline-flex items-center justify-center bg-default-100 text-default-900 rounded-full h-10 w-10"><i
                                class="ti ti-shopping-cart text-lg"></i></a>
                    </div>

                    <div class="text-center">
                        <img src="assets/2-423cfe2a.png" alt="" class="flex mx-auto my-4">
                        <h6 class="font-semibold text-xl text-default-900 mb-1">Cashew Nut</h6>
                        <h4 class="font-medium text-base text-primary mb-2">$18.96 <span
                                class="text-default-600 text-sm line-through">$32.86</span></h4>
                    </div>

                    <div class="flex items-center justify-center gap-2">
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                    </div>
                </div>
            </div><!-- end grid-cols -->

            <div class="border border-default-200 rounded-lg">
                <div class="p-5 relative">
                    <div class="absolute top-4 end-4">
                        <a href="#"
                           class="inline-flex items-center justify-center bg-default-100 text-default-900 rounded-full h-10 w-10"><i
                                class="ti ti-shopping-cart text-lg"></i></a>
                    </div>

                    <div class="text-center">
                        <img src="assets/3-eb4bb056.png" alt="" class="flex mx-auto my-4">
                        <h6 class="font-semibold text-xl text-default-900 mb-1">Grapes</h6>
                        <h4 class="font-medium text-base text-primary mb-2">$29.48 <span
                                class="text-default-600 text-sm line-through">$36.72</span></h4>
                    </div>

                    <div class="flex items-center justify-center gap-2">
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                    </div>
                </div>
            </div><!-- end grid-cols -->

            <div class="border border-default-200 rounded-lg">
                <div class="p-5 relative">
                    <div class="absolute top-4 end-4">
                        <a href="#"
                           class="inline-flex items-center justify-center bg-default-100 text-default-900 rounded-full h-10 w-10"><i
                                class="ti ti-shopping-cart text-lg"></i></a>
                    </div>

                    <div class="text-center">
                        <img src="assets/4-84c13641.png" alt="" class="flex mx-auto my-4">
                        <h6 class="font-semibold text-xl text-default-900 mb-1">Banana Chips</h6>
                        <h4 class="font-medium text-base text-primary mb-2">$20.68 <span
                                class="text-default-600 text-sm line-through">$40.88</span></h4>
                    </div>

                    <div class="flex items-center justify-center gap-2">
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-half-filled text-lg text-yellow-400"></i></button>
                    </div>
                </div>
            </div><!-- end grid-cols -->

            <div class="border border-default-200 rounded-lg">
                <div class="p-5 relative">
                    <div class="absolute top-4 end-4">
                        <a href="#"
                           class="inline-flex items-center justify-center bg-default-100 text-default-900 rounded-full h-10 w-10"><i
                                class="ti ti-shopping-cart text-lg"></i></a>
                    </div>

                    <div class="text-center">
                        <img src="assets/5-6588f4cc.png" alt="" class="flex mx-auto my-4">
                        <h6 class="font-semibold text-xl text-default-900 mb-1">Protinex Powder</h6>
                        <h4 class="font-medium text-base text-primary mb-2">$68.66 <span
                                class="text-default-600 text-sm line-through">$96.34</span></h4>
                    </div>

                    <div class="flex items-center justify-center gap-2">
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-half-filled text-lg text-yellow-400"></i></button>
                    </div>
                </div>
            </div><!-- end grid-cols -->

            <div class="border border-default-200 rounded-lg">
                <div class="p-5 relative">
                    <div class="absolute top-4 end-4">
                        <a href="#"
                           class="inline-flex items-center justify-center bg-default-100 text-default-900 rounded-full h-10 w-10"><i
                                class="ti ti-shopping-cart text-lg"></i></a>
                    </div>

                    <div class="text-center">
                        <img src="assets/6-fc45c68a.png" alt="" class="flex mx-auto my-4">
                        <h6 class="font-semibold text-xl text-default-900 mb-1">Nuts And Berries</h6>
                        <h4 class="font-medium text-base text-primary mb-2">$48.96 <span
                                class="text-default-600 text-sm line-through">$38.49</span></h4>
                    </div>

                    <div class="flex items-center justify-center gap-2">
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-filled text-lg text-yellow-400"></i></button>
                        <button><i class="ti ti-star-half-filled text-lg text-yellow-400"></i></button>
                    </div>
                </div>
            </div><!-- end grid-cols -->
        </div><!-- end grid -->

        <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">
            <div class="flex items-center justify-between py-4 px-5">
                <h4 class="text-lg font-medium text-default-950 capitalize">Recent Order</h4>

                <div class="relative">
                    <select id="all-select-categories" data-hs-select='{
                        "toggleTag": "<button type=\"button\"></button>",
                        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 block w-full rounded-full py-2 ps-4 pe-10 text-default-900 text-sm focus:ring-transparent border border-default-200 transition-all duration-300 hover:bg-default-100 before:absolute before:inset-0 before:z-[1]",
                        "dropdownClasses": "mt-2 z-50 min-w-[200px] max-h-[300px] p-1.5 space-y-0.5 bg-white border border-default-200 rounded-lg overflow-hidden overflow-y-auto end-0 dark:bg-default-50",
                        "optionClasses": "py-2 px-3 w-full text-sm text-default-800 cursor-pointer rounded-md hover:bg-default-100 focus:outline-none focus:bg-default-100",
                        "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><i class=\"ti ti-checks text-lg flex-shrink-0 text-primary\" /></i></span></div>"
                        }' class="hidden">
                        <option>Today</option>
                        <option>Yesterday</option>
                        <option>Last 7 Days</option>
                        <option>Last 30 Days</option>
                        <option>This Month</option>
                        <option>Last Month</option>
                    </select>

                    <div class="absolute -inset-y-0 start-auto end-3 flex items-center">
                        <i class="ti ti-chevron-down shrink text-base/none"></i>
                    </div>
                </div><!-- End Select -->
            </div>
            <div class="border-t border-dashed border-default-200">
                <div class="overflow-x-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-default-200">
                                <thead class="bg-default-100">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-default-600 uppercase">
                                        Order Number
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-default-600 uppercase">
                                        Product Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-default-600 uppercase">
                                        Order Date
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-default-600 uppercase">
                                        Price
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-default-600 uppercase">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-default-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                        #CT0023
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                        Nuts And Berries
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">28 Mar 2023
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">$12.23</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <span
                                            class="px-3 py-1 text-xs font-medium rounded-md bg-amber-500/20 text-amber-500">Pending</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                        #CT0023
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                        Protinex Powder
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">27 Apr 2023
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">$42.36</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <span
                                            class="px-3 py-1 text-xs font-medium rounded-md bg-primary/10 text-primary">Shipped</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                        #CT0024
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                        Banana Chips
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">31 Jan 2023
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">$62.12</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <span
                                            class="px-3 py-1 text-xs font-medium rounded-md bg-red-500/10 text-red-500">Cancel</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                        #CT0025
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                        Grapes
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">16 Feb 2023
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">$74.46</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <span
                                            class="px-3 py-1 text-xs font-medium rounded-md bg-primary/10 text-primary">Shipped</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                        #CT0026
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-default-800">
                                        Cashew Nut
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">45 Feb 2023
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-default-800">$52.12</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <span
                                            class="px-3 py-1 text-xs font-medium rounded-md bg-blue-500/10 text-blue-500">Processing</span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>

    <button
        class="fixed bottom-18 end-4 z-50 inline-flex h-10 w-10 items-center justify-center rounded-full bg-primary/20 text-primary opacity-0 backdrop-blur-xl transition-all duration-500 lg:bottom-4 print:hidden"
        data-toggle="back-to-top">
        <i class="ti ti-chevron-up text-xl"></i>
    </button>

    <!-- End Content -->
@endsection

