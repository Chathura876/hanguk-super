@extends('owner.app')
@section('content')

    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #printableArea, #printableArea * {
                visibility: visible;
            }
            #printableArea {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }
        }
    </style>

    <div class="p-6 space-y-6">

        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Profit</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Profit
                </li>
            </ol>
        </div>
        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-6">
            <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">
                <div class="p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-base font-semibold text-default-600">Today profit</p>
                            <h4 class="text-2xl font-semibold text-default-900 mt-4">Rs 10000.00</h4>
                        </div>
                        <span class="shrink h-18 w-18 inline-flex items-center justify-center rounded-lg bg-primary/20 text-primary">
                        <i class="ti ti-chalkboard text-4xl"></i>
                      </span>
                    </div>
                </div>
            </div>
            <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">
                <div class="p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-base font-semibold text-default-600">Previous Week Profit</p>
                            <h4 class="text-2xl font-semibold text-default-900 mt-4"></h4>
                        </div>
                        <span class="shrink h-18 w-18 inline-flex items-center justify-center rounded-lg bg-cyan-500/20 text-cyan-500">
                        <i class="ti ti-brand-planetscale text-4xl"></i>
                      </span>
                    </div>
                </div>
            </div>
            <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">
                <div class="p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-base font-semibold text-default-600">Profit to (Current Date)</p>
                            <h4 class="text-2xl font-semibold text-default-900 mt-4"></h4>
                        </div>
                        <span class="shrink h-18 w-18 inline-flex items-center justify-center rounded-lg bg-amber-500/20 text-amber-500">
                        <i class="ti ti-activity-heartbeat text-4xl"></i>
                      </span>
                    </div>
                </div>
            </div>
            <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">
                <div class="p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-base font-semibold text-default-600">July Total Profit (Previous Month)</p>
                            <h4 class="text-2xl font-semibold text-default-900 mt-4"></h4>
                        </div>
                        <span class="shrink h-18 w-18 inline-flex items-center justify-center rounded-lg bg-red-500/20 text-red-500">
                        <i class="ti ti-circle-off text-4xl"></i>
                      </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">
            <div class="flex items-center justify-between py-4 px-5">
                <div class="">
                    <h5 class="text-lg font-medium text-default-950 capitalize mb-1">Sales Reports</h5>
{{--                        <p class="text-default-600 text-sm font-medium">Theme Default Tab.</p>--}}
                </div>
            </div>
            <div class="p-5 border-t border-dashed border-default-200">
                <div class="border-b border-default-200">
                    <nav class="flex space-x-2" aria-label="Tabs" role="tablist">
                        <button type="button" class="hs-tab-active:bg-white dark:hs-tab-active:bg-default-50
                        hs-tab-active:border hs-tab-active:border-default-200 hs-tab-active:border-b-transparent -mb-px
                        py-2 px-3 inline-flex items-center gap-2 font-semibold text-center text-default-600 rounded-t-lg
                        active" id="card-type-tab-item-1"
                                data-hs-tab="#card-type-tab-1"
                                aria-controls="card-type-tab-1"
                                role="tab">
                            Today
                        </button>
                        <button type="button" class="hs-tab-active:bg-white dark:hs-tab-active:bg-default-50
                         hs-tab-active:border hs-tab-active:border-default-200 hs-tab-active:border-b-transparent -mb-px
                         py-2 px-3 inline-flex items-center gap-2 font-semibold text-center text-default-600 rounded-t-lg"
                                id="card-type-tab-item-2" data-hs-tab="#card-type-tab-2" aria-controls="card-type-tab-2" role="tab">
                            Last 7 days
                        </button>
                        <button type="button" class="hs-tab-active:bg-white dark:hs-tab-active:bg-default-50
                        hs-tab-active:border hs-tab-active:border-default-200 hs-tab-active:border-b-transparent -mb-px
                        py-2 px-3 inline-flex items-center gap-2 font-semibold text-center text-default-600 rounded-t-lg"
                                id="card-type-tab-item-3" data-hs-tab="#card-type-tab-3" aria-controls="card-type-tab-3" role="tab">
                            This month
                        </button>
                        <button type="button" class="hs-tab-active:bg-white dark:hs-tab-active:bg-default-50 hs-tab-active:border hs-tab-active:border-default-200 hs-tab-active:border-b-transparent -mb-px py-2 px-3 inline-flex items-center gap-2 font-semibold text-center text-default-600 rounded-t-lg" id="card-type-tab-item-4" data-hs-tab="#card-type-tab-4" aria-controls="card-type-tab-4" role="tab">
                            <input type="date">
                        </button>
                    </nav>
                </div>
                <div class="mt-3">
                    <div id="card-type-tab-1" role="tabpanel" aria-labelledby="card-type-tab-item-1" class="">
                        <div class="p-6 space-y-6">

                            <div id="printableArea" class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit print:shadow-none print:rounded-none print:border-none">
                                <div class="p-5 print:p-0">

                                    <div class="mb-10">
                                        <div class="flex justify-between items-center">

                                            <div>
                                                <img src="{{asset('Hanguk_super/assets/IMG/logo/logo1.png')}}" alt="logo-dark" class="h-36">
                                            </div> <!-- logo-dark end -->

                                            <div class="flex sm:justify-end space-y-2">

                                                <div class="grid gap-3">

                                                    <div class="grid grid-cols-4 gap-x-3">
                                                        <h6 class="col-span-2 font-semibold text-default-900">Date:</h6>
                                                        <p class="col-span-2 sm:text-end text-default-600 font-medium">Jan 17, 2023</p>
                                                    </div> <!-- grid-end -->

                                                    <div class="grid grid-cols-4 gap-x-3">
                                                        <h6 class="col-span-2 font-semibold text-default-900">Report No. :</h6>
                                                        <p class="col-span-2 sm:text-end text-default-600 font-medium">#123456</p>
                                                    </div> <!-- grid-end -->

                                                    <div class="grid grid-cols-4 gap-x-3">
                                                        <h6 class="col-span-2 font-semibold text-default-900">Profit :</h6>
                                                        <p class="col-span-2 sm:text-end text-default-600 font-medium">Rs. 00.00</p>
                                                    </div> <!-- grid-end -->

                                                </div> <!-- grid-end -->

                                            </div> <!-- flex-end -->
                                        </div> <!-- flex-end -->
                                    </div>

                                    <div class="mb-5">
                                        <div class="flex flex-col">
                                            <div>
                                                <div class="min-w-full inline-block align-middle overflow-hidden border border-default-200 rounded-md">

                                                    <table class="min-w-full">
                                                        <thead class="border-b py-3 bg-default-100 border-default-200 ">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Product ID</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Product Name</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Selling Price (Rs.)</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Stock Price (Rs.)</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Qty</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Total (Rs.)</th>
                                                        </tr> <!-- tr-end -->
                                                        </thead> <!-- thead-end -->

                                                        <tbody>
                                                        @foreach($profitsToday as $profit)
                                                        <tr class="text-default-500 transition-all duration-300 border-b border-default-200 hover:bg-default-100">
                                                            <td class="px-6 py-2 font-medium">{{$profit['barcode']}}</td>
                                                            <td class="px-6 py-2 font-medium">{{$profit['product_name']}}</td>
                                                            <td class="px-6 py-2 font-medium">{{$profit['selling_price']}}</td>
                                                            <td class="px-6 py-2 font-medium">{{$profit['stock_price']}}</td>
                                                            <td class="px-6 py-2 font-medium">{{$profit['quantity']}}</td>
                                                            <td class="px-6 py-2 font-medium">{{$profit['profit']}}</td>
                                                        </tr> <!-- tr-end -->
                                                        @endforeach
                                                        </tbody> <!-- tbody-end -->

                                                    </table> <!-- table-end -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="*:border-b *:border-default-200 bg-default-100 mb-8">
                                        <div class="flex items-center justify-between p-3">
                                            <h6 class="text-base text-default-800 font-medium">Sales Amount :</h6>
                                            <h6 class="text-base text-default-800 font-medium">Rs.<span>{{$totalSaleToday}}</span></h6>
                                        </div>
                                        <div class="flex items-center justify-between p-3">
                                            <h6 class="text-base text-default-800 font-medium">Total Expenses :</h6>
                                            <h6 class="text-base text-default-800 font-medium">Rs. 00.00</h6>
                                        </div>
                                        <div class="flex items-center justify-between p-3">
                                            <h6 class="text-base text-default-800 font-medium">Net Profit :</h6>
                                            <h6 class="text-base text-default-800 font-medium">Rs.<span>{{$totalProfitToday}}</span></h6>
                                        </div>

                                    </div>

                                    <div class="mt-10">
                                        <div class="flex sm:justify-end gap-2 print:hidden">
                                            <a href="#" download="filename.xlsx" class="py-2 px-4 inline-flex items-center justify-center font-semibold tracking-wide align-middle duration-500 text-xs text-center bg-primary-500 hover:bg-primary-600 text-white rounded">
                                                <i class="ti ti-file-spreadsheet text-lg/none me-1"></i> Excel
                                            </a>
{{--                                            <a href="javascript:window.print()" class="py-2 px-4 inline-flex items-center justify-center font-semibold tracking-wide align-middle duration-500 text-xs text-center bg-primary-500 hover:bg-primary-600 text-white rounded"><i class="ti ti-printer text-lg/none me-1"></i> Print</a>--}}
                                            <a href="javascript:window.print()" class="py-2 px-4 inline-flex items-center justify-center font-semibold tracking-wide align-middle duration-500 text-xs text-center bg-primary-500 hover:bg-primary-600 text-white rounded"><i class="ti ti-printer text-lg/none me-1"></i> Print</a>

                                            <button type="button" class="px-4 inline-flex items-center justify-center font-semibold tracking-wide align-middle duration-500 text-xs text-center bg-primary-500 hover:bg-primary-600 text-white rounded"><i class="ti ti-file-download text-lg/none me-1"></i> Save
                                            </button></div> <!-- flex-end -->
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="card-type-tab-2" class="hidden" role="tabpanel" aria-labelledby="card-type-tab-item-2">
                        <div class="p-6 space-y-6">

                            <div id="printableArea" class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit print:shadow-none print:rounded-none print:border-none">
                                <div class="p-5 print:p-0">

                                    <div class="mb-10">
                                        <div class="flex justify-between items-center">

                                            <div>
                                                <img src="{{asset('Hanguk_super/assets/IMG/logo/logo1.png')}}" alt="logo-dark" class="h-36">
                                            </div> <!-- logo-dark end -->

                                            <div class="flex sm:justify-end space-y-2">

                                                <div class="grid gap-3">

                                                    <div class="grid grid-cols-4 gap-x-3">
                                                        <h6 class="col-span-2 font-semibold text-default-900">Date:</h6>
                                                        <p class="col-span-2 sm:text-end text-default-600 font-medium">Jan 17, 2023</p>
                                                    </div> <!-- grid-end -->

                                                    <div class="grid grid-cols-4 gap-x-3">
                                                        <h6 class="col-span-2 font-semibold text-default-900">Report No. :</h6>
                                                        <p class="col-span-2 sm:text-end text-default-600 font-medium">#123456</p>
                                                    </div> <!-- grid-end -->

                                                    <div class="grid grid-cols-4 gap-x-3">
                                                        <h6 class="col-span-2 font-semibold text-default-900">Profit :</h6>
                                                        <p class="col-span-2 sm:text-end text-default-600 font-medium">Rs. 00.00</p>
                                                    </div> <!-- grid-end -->

                                                </div> <!-- grid-end -->

                                            </div> <!-- flex-end -->
                                        </div> <!-- flex-end -->
                                    </div>

                                    <div class="mb-5">
                                        <div class="flex flex-col">
                                            <div>
                                                <div class="min-w-full inline-block align-middle overflow-hidden border border-default-200 rounded-md">

                                                    <table class="min-w-full">
                                                        <thead class="border-b py-3 bg-default-100 border-default-200 ">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Product ID</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Product Name</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Selling Price (Rs.)</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Stock Price (Rs.)</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Qty</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Total (Rs.)</th>
                                                        </tr> <!-- tr-end -->
                                                        </thead> <!-- thead-end -->

                                                        <tbody>
                                                        @foreach($profits7Day as $profit)
                                                            <tr class="text-default-500 transition-all duration-300 border-b border-default-200 hover:bg-default-100">
                                                                <td class="px-6 py-2 font-medium">{{$profit['barcode']}}</td>
                                                                <td class="px-6 py-2 font-medium">{{$profit['product_name']}}</td>
                                                                <td class="px-6 py-2 font-medium">{{$profit['selling_price']}}</td>
                                                                <td class="px-6 py-2 font-medium">{{$profit['stock_price']}}</td>
                                                                <td class="px-6 py-2 font-medium">{{$profit['quantity']}}</td>
                                                                <td class="px-6 py-2 font-medium">{{$profit['profit']}}</td>
                                                            </tr> <!-- tr-end -->
                                                        @endforeach
                                                        </tbody> <!-- tbody-end -->

                                                    </table> <!-- table-end -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="*:border-b *:border-default-200 bg-default-100 mb-8">
                                        <div class="flex items-center justify-between p-3">
                                            <h6 class="text-base text-default-800 font-medium">Sales Amount :</h6>
                                            <h6 class="text-base text-default-800 font-medium">Rs.<span>{{$totalSale7Day}}</span></h6>
                                        </div>
                                        <div class="flex items-center justify-between p-3">
                                            <h6 class="text-base text-default-800 font-medium">Total Expenses :</h6>
                                            <h6 class="text-base text-default-800 font-medium">Rs. 00.00</h6>
                                        </div>
                                        <div class="flex items-center justify-between p-3">
                                            <h6 class="text-base text-default-800 font-medium">Net Profit :</h6>
                                            <h6 class="text-base text-default-800 font-medium">Rs.<span>{{$totalProfit7Day}}</span></h6>
                                        </div>

                                    </div>

                                    <div class="mt-10">
                                        <div class="flex sm:justify-end gap-2 print:hidden">
                                            <a href="#" download="filename.xlsx" class="py-2 px-4 inline-flex items-center justify-center font-semibold tracking-wide align-middle duration-500 text-xs text-center bg-primary-500 hover:bg-primary-600 text-white rounded">
                                                <i class="ti ti-file-spreadsheet text-lg/none me-1"></i> Excel
                                            </a>
                                            {{--                                            <a href="javascript:window.print()" class="py-2 px-4 inline-flex items-center justify-center font-semibold tracking-wide align-middle duration-500 text-xs text-center bg-primary-500 hover:bg-primary-600 text-white rounded"><i class="ti ti-printer text-lg/none me-1"></i> Print</a>--}}
                                            <a href="javascript:window.print()" class="py-2 px-4 inline-flex items-center justify-center font-semibold tracking-wide align-middle duration-500 text-xs text-center bg-primary-500 hover:bg-primary-600 text-white rounded"><i class="ti ti-printer text-lg/none me-1"></i> Print</a>

                                            <button type="button" class="px-4 inline-flex items-center justify-center font-semibold tracking-wide align-middle duration-500 text-xs text-center bg-primary-500 hover:bg-primary-600 text-white rounded"><i class="ti ti-file-download text-lg/none me-1"></i> Save
                                            </button></div> <!-- flex-end -->
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="card-type-tab-3" class="hidden" role="tabpanel" aria-labelledby="card-type-tab-item-3">
                        <div class="p-6 space-y-6">

                            <div id="printableArea" class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit print:shadow-none print:rounded-none print:border-none">
                                <div class="p-5 print:p-0">

                                    <div class="mb-10">
                                        <div class="flex justify-between items-center">

                                            <div>
                                                <img src="{{asset('Hanguk_super/assets/IMG/logo/logo1.png')}}" alt="logo-dark" class="h-36">
                                            </div> <!-- logo-dark end -->

                                            <div class="flex sm:justify-end space-y-2">

                                                <div class="grid gap-3">

                                                    <div class="grid grid-cols-4 gap-x-3">
                                                        <h6 class="col-span-2 font-semibold text-default-900">Date:</h6>
                                                        <p class="col-span-2 sm:text-end text-default-600 font-medium">Jan 17, 2023</p>
                                                    </div> <!-- grid-end -->

                                                    <div class="grid grid-cols-4 gap-x-3">
                                                        <h6 class="col-span-2 font-semibold text-default-900">Report No. :</h6>
                                                        <p class="col-span-2 sm:text-end text-default-600 font-medium">#123456</p>
                                                    </div> <!-- grid-end -->

                                                    <div class="grid grid-cols-4 gap-x-3">
                                                        <h6 class="col-span-2 font-semibold text-default-900">Profit :</h6>
                                                        <p class="col-span-2 sm:text-end text-default-600 font-medium">Rs. 00.00</p>
                                                    </div> <!-- grid-end -->

                                                </div> <!-- grid-end -->

                                            </div> <!-- flex-end -->
                                        </div> <!-- flex-end -->
                                    </div>

                                    <div class="mb-5">
                                        <div class="flex flex-col">
                                            <div>
                                                <div class="min-w-full inline-block align-middle overflow-hidden border border-default-200 rounded-md">

                                                    <table class="min-w-full">
                                                        <thead class="border-b py-3 bg-default-100 border-default-200 ">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Product ID</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Product Name</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Selling Price (Rs.)</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Stock Price (Rs.)</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Qty</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Total (Rs.)</th>
                                                        </tr> <!-- tr-end -->
                                                        </thead> <!-- thead-end -->

                                                        <tbody>
                                                        @foreach($profits30Day as $profit)
                                                            <tr class="text-default-500 transition-all duration-300 border-b border-default-200 hover:bg-default-100">
                                                                <td class="px-6 py-2 font-medium">{{$profit['barcode']}}</td>
                                                                <td class="px-6 py-2 font-medium">{{$profit['product_name']}}</td>
                                                                <td class="px-6 py-2 font-medium">{{$profit['selling_price']}}</td>
                                                                <td class="px-6 py-2 font-medium">{{$profit['stock_price']}}</td>
                                                                <td class="px-6 py-2 font-medium">{{$profit['quantity']}}</td>
                                                                <td class="px-6 py-2 font-medium">{{$profit['profit']}}</td>
                                                            </tr> <!-- tr-end -->
                                                        @endforeach
                                                        </tbody> <!-- tbody-end -->

                                                    </table> <!-- table-end -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="*:border-b *:border-default-200 bg-default-100 mb-8">
                                        <div class="flex items-center justify-between p-3">
                                            <h6 class="text-base text-default-800 font-medium">Sales Amount :</h6>
                                            <h6 class="text-base text-default-800 font-medium">Rs.<span>{{$totalSale30Day}}</span></h6>
                                        </div>
                                        <div class="flex items-center justify-between p-3">
                                            <h6 class="text-base text-default-800 font-medium">Total Expenses :</h6>
                                            <h6 class="text-base text-default-800 font-medium">Rs. 00.00</h6>
                                        </div>
                                        <div class="flex items-center justify-between p-3">
                                            <h6 class="text-base text-default-800 font-medium">Net Profit :</h6>
                                            <h6 class="text-base text-default-800 font-medium">Rs.<span>{{$totalProfit30Day}}</span></h6>
                                        </div>

                                    </div>

                                    <div class="mt-10">
                                        <div class="flex sm:justify-end gap-2 print:hidden">
                                            <a href="#" download="filename.xlsx" class="py-2 px-4 inline-flex items-center justify-center font-semibold tracking-wide align-middle duration-500 text-xs text-center bg-primary-500 hover:bg-primary-600 text-white rounded">
                                                <i class="ti ti-file-spreadsheet text-lg/none me-1"></i> Excel
                                            </a>
                                            {{--                                            <a href="javascript:window.print()" class="py-2 px-4 inline-flex items-center justify-center font-semibold tracking-wide align-middle duration-500 text-xs text-center bg-primary-500 hover:bg-primary-600 text-white rounded"><i class="ti ti-printer text-lg/none me-1"></i> Print</a>--}}
                                            <a href="javascript:window.print()" class="py-2 px-4 inline-flex items-center justify-center font-semibold tracking-wide align-middle duration-500 text-xs text-center bg-primary-500 hover:bg-primary-600 text-white rounded"><i class="ti ti-printer text-lg/none me-1"></i> Print</a>

                                            <button type="button" class="px-4 inline-flex items-center justify-center font-semibold tracking-wide align-middle duration-500 text-xs text-center bg-primary-500 hover:bg-primary-600 text-white rounded"><i class="ti ti-file-download text-lg/none me-1"></i> Save
                                            </button></div> <!-- flex-end -->
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div id="card-type-tab-4" class="hidden" role="tabpanel" aria-labelledby="card-type-tab-item-4">
                        <div class="p-6 space-y-6">

                            <div id="printableArea" class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit print:shadow-none print:rounded-none print:border-none">
                                <div class="p-5 print:p-0">

                                    <div class="mb-10">
                                        <div class="flex justify-between items-center">

                                            <div>
                                                <img src="{{asset('Hanguk_super/assets/IMG/logo/logo1.png')}}" alt="logo-dark" class="h-36">
                                            </div> <!-- logo-dark end -->

                                            <div class="flex sm:justify-end space-y-2">

                                                <div class="grid gap-3">

                                                    <div class="grid grid-cols-4 gap-x-3">
                                                        <h6 class="col-span-2 font-semibold text-default-900">Date:</h6>
                                                        <p class="col-span-2 sm:text-end text-default-600 font-medium">Jan 17, 2023</p>
                                                    </div> <!-- grid-end -->

                                                    <div class="grid grid-cols-4 gap-x-3">
                                                        <h6 class="col-span-2 font-semibold text-default-900">Report No. :</h6>
                                                        <p class="col-span-2 sm:text-end text-default-600 font-medium">#123456</p>
                                                    </div> <!-- grid-end -->

                                                    <div class="grid grid-cols-4 gap-x-3">
                                                        <h6 class="col-span-2 font-semibold text-default-900">Profit :</h6>
                                                        <p class="col-span-2 sm:text-end text-default-600 font-medium">Rs. 00.00</p>
                                                    </div> <!-- grid-end -->

                                                </div> <!-- grid-end -->

                                            </div> <!-- flex-end -->
                                        </div> <!-- flex-end -->
                                    </div>

                                    <div class="mb-5">
                                        <div class="flex flex-col">
                                            <div>
                                                <div class="min-w-full inline-block align-middle overflow-hidden border border-default-200 rounded-md">

                                                    <table class="min-w-full">
                                                        <thead class="border-b py-3 bg-default-100 border-default-200 ">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Product ID</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Product Name</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Selling Price (Rs.)</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Stock Price (Rs.)</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Qty</th>
                                                            <th scope="col" class="px-6 py-2 text-left font-semibold text-default-500">Total (Rs.)</th>
                                                        </tr> <!-- tr-end -->
                                                        </thead> <!-- thead-end -->

                                                        <tbody>
                                                        @foreach($profits30Day as $profit)
                                                            <tr class="text-default-500 transition-all duration-300 border-b border-default-200 hover:bg-default-100">
                                                                <td class="px-6 py-2 font-medium">{{$profit['barcode']}}</td>
                                                                <td class="px-6 py-2 font-medium">{{$profit['product_name']}}</td>
                                                                <td class="px-6 py-2 font-medium">{{$profit['selling_price']}}</td>
                                                                <td class="px-6 py-2 font-medium">{{$profit['stock_price']}}</td>
                                                                <td class="px-6 py-2 font-medium">{{$profit['quantity']}}</td>
                                                                <td class="px-6 py-2 font-medium">{{$profit['profit']}}</td>
                                                            </tr> <!-- tr-end -->
                                                        @endforeach
                                                        </tbody> <!-- tbody-end -->

                                                    </table> <!-- table-end -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="*:border-b *:border-default-200 bg-default-100 mb-8">
                                        <div class="flex items-center justify-between p-3">
                                            <h6 class="text-base text-default-800 font-medium">Sales Amount :</h6>
                                            <h6 class="text-base text-default-800 font-medium">Rs. 750.00</h6>
                                        </div>
                                        <div class="flex items-center justify-between p-3">
                                            <h6 class="text-base text-default-800 font-medium">Total Expenses :</h6>
                                            <h6 class="text-base text-default-800 font-medium">Rs. 00.00</h6>
                                        </div>
                                        <div class="flex items-center justify-between p-3">
                                            <h6 class="text-base text-default-800 font-medium">Net Profit :</h6>
                                            <h6 class="text-base text-default-800 font-medium">Rs. 750.00</h6>
                                        </div>

                                    </div>

                                    <div class="mt-10">
                                        <div class="flex sm:justify-end gap-2 print:hidden">
                                            <a href="#" download="filename.xlsx" class="py-2 px-4 inline-flex items-center justify-center font-semibold tracking-wide align-middle duration-500 text-xs text-center bg-primary-500 hover:bg-primary-600 text-white rounded">
                                                <i class="ti ti-file-spreadsheet text-lg/none me-1"></i> Excel
                                            </a>
                                            {{--                                            <a href="javascript:window.print()" class="py-2 px-4 inline-flex items-center justify-center font-semibold tracking-wide align-middle duration-500 text-xs text-center bg-primary-500 hover:bg-primary-600 text-white rounded"><i class="ti ti-printer text-lg/none me-1"></i> Print</a>--}}
                                            <a href="javascript:window.print()" class="py-2 px-4 inline-flex items-center justify-center font-semibold tracking-wide align-middle duration-500 text-xs text-center bg-primary-500 hover:bg-primary-600 text-white rounded"><i class="ti ti-printer text-lg/none me-1"></i> Print</a>

                                            <button type="button" class="px-4 inline-flex items-center justify-center font-semibold tracking-wide align-middle duration-500 text-xs text-center bg-primary-500 hover:bg-primary-600 text-white rounded"><i class="ti ti-file-download text-lg/none me-1"></i> Save
                                            </button></div> <!-- flex-end -->
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
