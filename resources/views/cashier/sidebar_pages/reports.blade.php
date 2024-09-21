@extends('cashier.cashier_app')
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

        <div class="d-flex w-100 align-items-center justify-content-between d-print-none">
            <h4 class="text-lg fw-semibold text-body">Profit</h4>

            <nav aria-label="breadcrumb" class="d-none d-md-flex gap-2 align-items-center">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="d-flex align-items-center text-muted text-decoration-none">
                            Hanguk Super
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active text-primary" aria-current="page">
                        Profit
                    </li>
                </ol>
            </nav>
        </div>


        <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">

            <div class="row g-4">
                <!-- Today profit -->
                <div class="col-lg-3 col-md-6">
                    <div class="border rounded-lg bg-white h-100">
                        <div class="p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="mb-0 fw-semibold text-muted">Today profit</p>
                                    <h4 class="mt-3 fw-semibold">Rs 10000.00</h4>
                                </div>
                                <span
                                    class="d-inline-flex align-items-center justify-content-center rounded bg-primary bg-opacity-10 text-primary"
                                    style="width: 72px; height: 72px;">
                        <i class="bi bi-chalkboard display-6"></i>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Previous Week Profit -->
                <div class="col-lg-3 col-md-6">
                    <div class="border rounded-lg bg-white h-100">
                        <div class="p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="mb-0 fw-semibold text-muted">Previous Week Profit</p>
                                    <h4 class="mt-3 fw-semibold"></h4>
                                </div>
                                <span
                                    class="d-inline-flex align-items-center justify-content-center rounded bg-info bg-opacity-10 text-info"
                                    style="width: 72px; height: 72px;">
                        <i class="bi bi-planet display-6"></i>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profit to (Current Date) -->
                <div class="col-lg-3 col-md-6">
                    <div class="border rounded-lg bg-white h-100">
                        <div class="p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="mb-0 fw-semibold text-muted">Profit to (Current Date)</p>
                                    <h4 class="mt-3 fw-semibold"></h4>
                                </div>
                                <span
                                    class="d-inline-flex align-items-center justify-content-center rounded bg-warning bg-opacity-10 text-warning"
                                    style="width: 72px; height: 72px;">
                        <i class="bi bi-heart-pulse display-6"></i>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- July Total Profit (Previous Month) -->
                <div class="col-lg-3 col-md-6">
                    <div class="border rounded-lg bg-white h-100">
                        <div class="p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="mb-0 fw-semibold text-muted">July Total Profit (Previous Month)</p>
                                    <h4 class="mt-3 fw-semibold"></h4>
                                </div>
                                <span
                                    class="d-inline-flex align-items-center justify-content-center rounded bg-danger bg-opacity-10 text-danger"
                                    style="width: 72px; height: 72px;">
                        <i class="bi bi-slash-circle display-6"></i>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="p-5 border-t border-dashed border-default-200">
                <div class="border-bottom">
                    <nav class="nav" role="tablist">
                        <!-- Today Tab -->
                        <button type="button" class="nav-link active border rounded-top px-3 py-2 fw-semibold"
                                id="card-type-tab-item-1" data-bs-toggle="tab" data-bs-target="#card-type-tab-1"
                                aria-controls="card-type-tab-1" role="tab">
                            Today
                        </button>
                        <!-- Weekly Tab -->
                        <button type="button" class="nav-link border rounded-top px-3 py-2 fw-semibold"
                                id="card-type-tab-item-2" data-bs-toggle="tab" data-bs-target="#card-type-tab-2"
                                aria-controls="card-type-tab-2" role="tab">
                            Weekly
                        </button>
                        <!-- Monthly Tab -->
                        <button type="button" class="nav-link border rounded-top px-3 py-2 fw-semibold"
                                id="card-type-tab-item-3" data-bs-toggle="tab" data-bs-target="#card-type-tab-3"
                                aria-controls="card-type-tab-3" role="tab">
                            Monthly
                        </button>
                        <!-- Date Tab with Date Input -->
                        <button type="button" class="nav-link border rounded-top px-3 py-2 fw-semibold"
                                id="card-type-tab-item-4" data-bs-toggle="tab" data-bs-target="#card-type-tab-4"
                                aria-controls="card-type-tab-4" role="tab">
                            <input type="date" class="form-control">
                        </button>
                    </nav>
                </div>

                <div class="mt-3">
                    <div id="card-type-tab-1" role="tabpanel" aria-labelledby="card-type-tab-item-1">
                        <div class="p-4">
                            <div id="printableArea" class="border rounded bg-white shadow-none">
                                <div class="p-4">
                                    <div class="mb-4">
                                        <div class="align-items-center">
                                            <div class="row">
                                                <div class="col-6">
                                                    <img src="{{asset('Hanguk_super/assets/IMG/logo/logo1.png')}}"
                                                         alt="logo-dark" class="img-fluid" style="height: 150px;">
                                                </div>
                                                <div class="col-6">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="row">
                                                                <div>
                                                                    <p class="mr-3">Cash Payment :Rs.</p>
                                                                </div>
                                                                <div>
                                                                    <p>{{$totalCashToday}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div>
                                                                    <p class="mr-3">Card Payment :Rs.</p>
                                                                </div>
                                                                <div>
                                                                    <p>{{$totalCardToday}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div>
                                                                    <p class="mr-3">Expenses :Rs.</p>
                                                                </div>
                                                                <div>
                                                                    <p>{{$todayExpences}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div>
                                                                    <p class="mr-3">Total cost :Rs.</p>
                                                                </div>
                                                                <div>
                                                                    <p>{{$totalCostToday}}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="row">
                                                                <div>
                                                                    <p class="mr-3">Total Sale :Rs.</p>
                                                                </div>
                                                                <div>
                                                                    <p>{{$totalSaleToday}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div>
                                                                    <p class="mr-3">Total Profit :Rs.</p>
                                                                </div>
                                                                <div>
                                                                    <p>{{$totalProfitToday}}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div>
                                                                    <p class="mr-3">Net Profit :Rs.</p>
                                                                </div>
                                                                <div>
                                                                    <p>{{$totalProfitToday - $todayExpences }}</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>


                                            <div class="d-flex gap-2 mb-4">
                                                <form action="{{ route('reports.download') }}" method="GET"
                                                      style="display: flex; align-items: center; gap: 15px; background-color: #f8f9fa; padding: 15px;
                 border-radius: 8px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);">

                                                    <label for="start_date"
                                                           style="font-size: 14px; font-weight: 600; color: #333; margin-right: 8px;">Start
                                                        Date:</label>
                                                    <input type="date" name="start_date" required
                                                           style="padding: 5px 10px; font-size: 14px; border: 1px solid #ced4da; border-radius: 4px;
                      background-color: #fff; color: #495057; width: 160px;">

                                                    <label for="end_date"
                                                           style="font-size: 14px; font-weight: 600; color: #333; margin-right: 8px;">End
                                                        Date:</label>
                                                    <input type="date" name="end_date" required
                                                           style="padding: 5px 10px; font-size: 14px; border: 1px solid #ced4da; border-radius: 4px;
                      background-color: #fff; color: #495057; width: 160px;">

                                                    <button type="submit"
                                                            style="padding: 8px 20px; background-color: #007bff; color: #fff; border: none; border-radius: 4px;
                       font-size: 14px; font-weight: 600; cursor: pointer; transition: background-color 0.3s ease;">
                                                        Generate Report
                                                    </button>

                                                    <input type="hidden" name="generate_pdf" value="1">
                                                </form>
                                            </div>


                                            <div class="flex-column">
                                                <div class="d-grid gap-2">
                                                    <div class="row">
                                                        <h6 class="col-6 fw-semibold text-dark">Date:</h6>
                                                        <p class="col-6 text-end text-muted">{{ today()->format('Y-m-d') }}</p>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Filter Options -->
                                    <div class="mb-4">
                                        <div class="table-responsive border rounded">
                                            <table class="table table-bordered">
                                                <thead class="bg-light">
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-2 text-left font-semibold text-default-500">
                                                        Product ID
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-2 text-left font-semibold text-default-500">
                                                        Product Name
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-2 text-left font-semibold text-default-500">
                                                        Selling Price (Rs.)
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-2 text-left font-semibold text-default-500">Stock
                                                        Price (Rs.)
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-2 text-left font-semibold text-default-500">
                                                        Discount Price (Rs.)
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-2 text-left font-semibold text-default-500">Qty
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-2 text-left font-semibold text-default-500">Total
                                                        (Rs.)
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($profitsToday as $profit)
                                                    <tr class="text-default-500 transition-all duration-300 border-b border-default-200 hover:bg-default-100">
                                                        <td class="px-6 py-2 font-medium">{{$profit['barcode']}}</td>
                                                        <td class="px-6 py-2 font-medium">{{$profit['product_name']}}</td>
                                                        <td class="px-6 py-2 font-medium">{{$profit['selling_price']}}</td>
                                                        <td class="px-6 py-2 font-medium">{{$profit['stock_price']}}</td>
                                                        <td class="px-6 py-2 font-medium">{{$profit['discount_price']}}</td>
                                                        <td class="px-6 py-2 font-medium">{{$profit['quantity']}}</td>
                                                        <td class="px-6 py-2 font-medium">{{$profit['profit']}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Report Summary -->
                                    {{--                                    <div class="border-bottom bg-light mb-4">--}}
                                    {{--                                        <div class="d-flex justify-content-between p-2">--}}
                                    {{--                                            <h6 class="text-dark fw-bold">Sales Amount :</h6>--}}
                                    {{--                                            <h6 class="text-dark fw-bold">Rs. {{ $stock->sum(fn($item) => $item->qty * $item->stock_price) }}</h6>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="d-flex justify-content-between p-2">--}}
                                    {{--                                            <h6 class="text-dark fw-bold">Total Expenses :</h6>--}}
                                    {{--                                            <h6 class="text-dark fw-bold">Rs. 00.00</h6>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="d-flex justify-content-between p-2">--}}
                                    {{--                                            <h6 class="text-dark fw-bold">Net Profit :</h6>--}}
                                    {{--                                            <h6 class="text-dark fw-bold">Rs. {{ $stock->sum(fn($item) => $item->qty * $item->stock_price) }}</h6>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

                                    <!-- Filter Buttons -->

                                </div>
                            </div>
                        </div>
                    </div>

                    {{--                    <div id="card-type-tab-2" class="d-none" role="tabpanel" aria-labelledby="card-type-tab-item-2">--}}
                    {{--                        <div class="p-4">--}}
                    {{--                            <div id="printableArea" class="border rounded bg-white shadow-none">--}}
                    {{--                                <div class="p-4">--}}
                    {{--                                    <div class="mb-4">--}}
                    {{--                                        <div class="d-flex justify-content-between align-items-center">--}}
                    {{--                                            <div>--}}
                    {{--                                                <img src="{{asset('Hanguk_super/assets/IMG/logo/logo1.png')}}" alt="logo-dark" class="img-fluid" style="height: 150px;">--}}
                    {{--                                            </div>--}}

                    {{--                                            <div class="d-flex flex-column">--}}
                    {{--                                                <div class="d-grid gap-2">--}}
                    {{--                                                    <div class="row">--}}
                    {{--                                                        <h6 class="col-6 fw-semibold text-dark">Date:</h6>--}}
                    {{--                                                        <p class="col-6 text-end text-muted">Jan 17, 2023</p>--}}
                    {{--                                                    </div>--}}
                    {{--                                                    <div class="row">--}}
                    {{--                                                        <h6 class="col-6 fw-semibold text-dark">Report No. :</h6>--}}
                    {{--                                                        <p class="col-6 text-end text-muted">#123456</p>--}}
                    {{--                                                    </div>--}}
                    {{--                                                    <div class="row">--}}
                    {{--                                                        <h6 class="col-6 fw-semibold text-dark">Profit :</h6>--}}
                    {{--                                                        <p class="col-6 text-end text-muted">Rs. 00.00</p>--}}
                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}

                    {{--                                    <!-- Filter Options -->--}}
                    {{--                                    <div class="mb-4">--}}
                    {{--                                        <div class="table-responsive border rounded">--}}
                    {{--                                            <table class="table table-bordered">--}}
                    {{--                                                <thead class="bg-light">--}}
                    {{--                                                <tr>--}}
                    {{--                                                    <th scope="col">Product ID</th>--}}
                    {{--                                                    <th scope="col">Product Name</th>--}}
                    {{--                                                    <th scope="col">Product Description</th>--}}
                    {{--                                                    <th scope="col">Price (Rs.)</th>--}}
                    {{--                                                    <th scope="col">Qty</th>--}}
                    {{--                                                    <th scope="col">Amount (Rs.)</th>--}}
                    {{--                                                    <th scope="col">Expenses</th>--}}
                    {{--                                                    <th scope="col">Total (Rs.)</th>--}}
                    {{--                                                </tr>--}}
                    {{--                                                </thead>--}}
                    {{--                                                <tbody>--}}
                    {{--                                                <tr>--}}
                    {{--                                                    <td>#4357</td>--}}
                    {{--                                                    <td>Imorich Blueberry Ice cream</td>--}}
                    {{--                                                    <td>750.00</td>--}}
                    {{--                                                    <td>1</td>--}}
                    {{--                                                    <td>750.00</td>--}}
                    {{--                                                    <td>1</td>--}}
                    {{--                                                    <td>1</td>--}}
                    {{--                                                </tr>--}}
                    {{--                                                </tbody>--}}
                    {{--                                            </table>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}

                    {{--                                    <!-- Report Summary -->--}}
                    {{--                                    <div class="border-bottom bg-light mb-4">--}}
                    {{--                                        <div class="d-flex justify-content-between p-2">--}}
                    {{--                                            <h6 class="text-dark fw-bold">Sales Amount :</h6>--}}
                    {{--                                            <h6 class="text-dark fw-bold">Rs. 750.00</h6>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="d-flex justify-content-between p-2">--}}
                    {{--                                            <h6 class="text-dark fw-bold">Total Expenses :</h6>--}}
                    {{--                                            <h6 class="text-dark fw-bold">Rs. 00.00</h6>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="d-flex justify-content-between p-2">--}}
                    {{--                                            <h6 class="text-dark fw-bold">Net Profit :</h6>--}}
                    {{--                                            <h6 class="text-dark fw-bold">Rs. 750.00</h6>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}

                    {{--                                    <!-- Action Buttons -->--}}
                    {{--                                    <div class="mt-4 d-flex justify-content-end gap-2">--}}
                    {{--                                        <a href="#" download="filename.xlsx" class="btn btn-primary">--}}
                    {{--                                            <i class="ti ti-file-spreadsheet"></i> Excel--}}
                    {{--                                        </a>--}}
                    {{--                                        <a href="javascript:window.print()" class="btn btn-primary">--}}
                    {{--                                            <i class="ti ti-printer"></i> Print--}}
                    {{--                                        </a>--}}
                    {{--                                        <button type="button" class="btn btn-primary">--}}
                    {{--                                            <i class="ti ti-file-download"></i> Save--}}
                    {{--                                        </button>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div id="card-type-tab-3" class="d-none" role="tabpanel" aria-labelledby="card-type-tab-item-3">--}}
                    {{--                        <div class="p-4">--}}
                    {{--                            <div id="printableArea" class="border rounded bg-white shadow-none">--}}
                    {{--                                <div class="p-4">--}}
                    {{--                                    <div class="mb-4">--}}
                    {{--                                        <div class="d-flex justify-content-between align-items-center">--}}
                    {{--                                            <div>--}}
                    {{--                                                <img src="{{asset('Hanguk_super/assets/IMG/logo/logo1.png')}}" alt="logo-dark" class="img-fluid" style="height: 150px;">--}}
                    {{--                                            </div>--}}

                    {{--                                            <div class="d-flex flex-column">--}}
                    {{--                                                <div class="d-grid gap-2">--}}
                    {{--                                                    <div class="row">--}}
                    {{--                                                        <h6 class="col-6 fw-semibold text-dark">Date:</h6>--}}
                    {{--                                                        <p class="col-6 text-end text-muted">Jan 17, 2023</p>--}}
                    {{--                                                    </div>--}}
                    {{--                                                    <div class="row">--}}
                    {{--                                                        <h6 class="col-6 fw-semibold text-dark">Report No. :</h6>--}}
                    {{--                                                        <p class="col-6 text-end text-muted">#123456</p>--}}
                    {{--                                                    </div>--}}
                    {{--                                                    <div class="row">--}}
                    {{--                                                        <h6 class="col-6 fw-semibold text-dark">Profit :</h6>--}}
                    {{--                                                        <p class="col-6 text-end text-muted">Rs. 00.00</p>--}}
                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}

                    {{--                                    <!-- Table -->--}}
                    {{--                                    <div class="mb-4">--}}
                    {{--                                        <div class="table-responsive border rounded">--}}
                    {{--                                            <table class="table table-bordered">--}}
                    {{--                                                <thead class="bg-light">--}}
                    {{--                                                <tr>--}}
                    {{--                                                    <th scope="col">Product ID</th>--}}
                    {{--                                                    <th scope="col">Product Name</th>--}}
                    {{--                                                    <th scope="col">Product Description</th>--}}
                    {{--                                                    <th scope="col">Price (Rs.)</th>--}}
                    {{--                                                    <th scope="col">Qty</th>--}}
                    {{--                                                    <th scope="col">Amount (Rs.)</th>--}}
                    {{--                                                    <th scope="col">Expenses</th>--}}
                    {{--                                                    <th scope="col">Total (Rs.)</th>--}}
                    {{--                                                </tr>--}}
                    {{--                                                </thead>--}}
                    {{--                                                <tbody>--}}
                    {{--                                                <tr>--}}
                    {{--                                                    <td>#4357</td>--}}
                    {{--                                                    <td>Imorich Blueberry Ice cream</td>--}}
                    {{--                                                    <td>750.00</td>--}}
                    {{--                                                    <td>1</td>--}}
                    {{--                                                    <td>750.00</td>--}}
                    {{--                                                    <td>1</td>--}}
                    {{--                                                    <td>1</td>--}}
                    {{--                                                </tr>--}}
                    {{--                                                </tbody>--}}
                    {{--                                            </table>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}

                    {{--                                    <!-- Report Summary -->--}}
                    {{--                                    <div class="border-bottom bg-light mb-4">--}}
                    {{--                                        <div class="d-flex justify-content-between p-2">--}}
                    {{--                                            <h6 class="text-dark fw-bold">Sales Amount :</h6>--}}
                    {{--                                            <h6 class="text-dark fw-bold">Rs. 750.00</h6>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="d-flex justify-content-between p-2">--}}
                    {{--                                            <h6 class="text-dark fw-bold">Total Expenses :</h6>--}}
                    {{--                                            <h6 class="text-dark fw-bold">Rs. 00.00</h6>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="d-flex justify-content-between p-2">--}}
                    {{--                                            <h6 class="text-dark fw-bold">Net Profit :</h6>--}}
                    {{--                                            <h6 class="text-dark fw-bold">Rs. 750.00</h6>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                    {{--                    <div id="card-type-tab-4" class="d-none" role="tabpanel" aria-labelledby="card-type-tab-item-4">--}}
                    {{--                        <div class="p-4">--}}
                    {{--                            <div id="printableArea" class="border rounded bg-white shadow-none">--}}
                    {{--                                <div class="p-4">--}}
                    {{--                                    <div class="mb-4">--}}
                    {{--                                        <div class="d-flex justify-content-between align-items-center">--}}
                    {{--                                            <div>--}}
                    {{--                                                <img src="{{asset('Hanguk_super/assets/IMG/logo/logo1.png')}}" alt="logo-dark" class="img-fluid" style="height: 150px;">--}}
                    {{--                                            </div>--}}

                    {{--                                            <div class="d-flex flex-column">--}}
                    {{--                                                <div class="d-grid gap-2">--}}
                    {{--                                                    <div class="row">--}}
                    {{--                                                        <h6 class="col-6 fw-semibold text-dark">Date:</h6>--}}
                    {{--                                                        <p class="col-6 text-end text-muted">Jan 17, 2023</p>--}}
                    {{--                                                    </div>--}}
                    {{--                                                    <div class="row">--}}
                    {{--                                                        <h6 class="col-6 fw-semibold text-dark">Report No. :</h6>--}}
                    {{--                                                        <p class="col-6 text-end text-muted">#123456</p>--}}
                    {{--                                                    </div>--}}
                    {{--                                                    <div class="row">--}}
                    {{--                                                        <h6 class="col-6 fw-semibold text-dark">Profit :</h6>--}}
                    {{--                                                        <p class="col-6 text-end text-muted">Rs. 00.00</p>--}}
                    {{--                                                    </div>--}}
                    {{--                                                </div>--}}
                    {{--                                            </div>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}

                    {{--                                    <!-- Table -->--}}
                    {{--                                    <div class="mb-4">--}}
                    {{--                                        <div class="table-responsive border rounded">--}}
                    {{--                                            <table class="table table-bordered">--}}
                    {{--                                                <thead class="bg-light">--}}
                    {{--                                                <tr>--}}
                    {{--                                                    <th scope="col">Product ID</th>--}}
                    {{--                                                    <th scope="col">Product Name</th>--}}
                    {{--                                                    <th scope="col">Product Description</th>--}}
                    {{--                                                    <th scope="col">Price (Rs.)</th>--}}
                    {{--                                                    <th scope="col">Qty</th>--}}
                    {{--                                                    <th scope="col">Amount (Rs.)</th>--}}
                    {{--                                                    <th scope="col">Expenses</th>--}}
                    {{--                                                    <th scope="col">Total (Rs.)</th>--}}
                    {{--                                                </tr>--}}
                    {{--                                                </thead>--}}
                    {{--                                                <tbody>--}}
                    {{--                                                <tr>--}}
                    {{--                                                    <td>#4357</td>--}}
                    {{--                                                    <td>Imorich Blueberry Ice cream</td>--}}
                    {{--                                                    <td>750.00</td>--}}
                    {{--                                                    <td>1</td>--}}
                    {{--                                                    <td>750.00</td>--}}
                    {{--                                                    <td>1</td>--}}
                    {{--                                                    <td>1</td>--}}
                    {{--                                                </tr>--}}
                    {{--                                                </tbody>--}}
                    {{--                                            </table>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}

                    {{--                                    <!-- Report Summary -->--}}
                    {{--                                    <div class="border-bottom bg-light mb-4">--}}
                    {{--                                        <div class="d-flex justify-content-between p-2">--}}
                    {{--                                            <h6 class="text-dark fw-bold">Sales Amount :</h6>--}}
                    {{--                                            <h6 class="text-dark fw-bold">Rs. 750.00</h6>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="d-flex justify-content-between p-2">--}}
                    {{--                                            <h6 class="text-dark fw-bold">Total Expenses :</h6>--}}
                    {{--                                            <h6 class="text-dark fw-bold">Rs. 00.00</h6>--}}
                    {{--                                        </div>--}}
                    {{--                                        <div class="d-flex justify-content-between p-2">--}}
                    {{--                                            <h6 class="text-dark fw-bold">Net Profit :</h6>--}}
                    {{--                                            <h6 class="text-dark fw-bold">Rs. 750.00</h6>--}}
                    {{--                                        </div>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                </div>
            </div>
        </div>
    </div>

@endsection
