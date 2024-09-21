@extends('cashier.cashier_app')
@push('CSS')

    <style>
        /* Ensure the rest of the page fits within the viewport */
        /*#posSection {*/
        /*    max-height: calc(100vh - 50px); !* Adjust the offset as needed *!*/
        /*    overflow: hidden;*/
        /*}*/

        /*.table-container {*/
        /*    max-height: 250px; !* Set your desired max height *!*/
        /*    overflow-y: auto;  !* Enable vertical scrolling *!*/
        /*    overflow-x: hidden; !* Prevent horizontal scrolling *!*/
        /*    position: relative; !* Create a containing block for sticky elements *!*/
        /*}*/

        /*.table-container-return {*/
        /*    max-height: 320px; !* Set your desired max height *!*/
        /*    overflow-y: auto;  !* Enable vertical scrolling *!*/
        /*    overflow-x: hidden; !* Prevent horizontal scrolling *!*/
        /*    position: relative; !* Create a containing block for sticky elements *!*/
        /*}*/

        /*.sticky-thead {*/
        /*    position: sticky;*/
        /*    top: 0; !* Stick the thead to the top of the table container *!*/
        /*    z-index: 2; !* Ensure it appears above the tbody content *!*/
        /*    background-color: #2d6a4f; !* Background color to match your header *!*/
        /*}*/

        /* Force the table height and evenly distribute row height */
        /*tbody {*/
        /*    display: table-row-group;*/
        /*    height: 100%;*/
        /*    display: flex;*/
        /*    flex-direction: column;*/
        /*}*/

        /*tbody tr {*/
        /*    flex: 1;*/
        /*    display: flex;*/
        /*}*/

        /*tbody td, tbody th {*/
        /*    flex: 1;*/
        /*    display: flex;*/
        /*    align-items: center;*/
        /*    justify-content: center;*/
        /*}*/

        /*!* Hide overflow for table *!*/
        /*tbody {*/
        /*    overflow: auto;*/
        /*}*/

        .d-none {
            display: none;
        }

        tr {
            height: 0 !important;
        }

        td {
            height: 0 !important;
        }

        /*#billTable{*/
        /*    height: 200px;*/
        /*}*/

        /*#billTable tbody tr{*/
        /*    height: 60px;*/
        /*}*/
        /*@media print {*/
        /*    .receipt {*/
        /*        width: 7.8cm; !* Set the width to 7.8cm *!*/
        /*        padding: 0;*/
        /*        margin: 0;*/
        /*        font-size: 12px; !* Adjust the font size for readability *!*/
        /*    }*/

        /*    !* Additional styles to control layout on print *!*/
        /*    .max-w-sm {*/
        /*        max-width: 100%;*/
        /*    }*/

        /*    .no-print {*/
        /*        display: none; !* Hide any elements not needed for printing *!*/
        /*    }*/
        /*}*/
        /*th{*/
        /*    font-size: 12px;*/
        /*}*/
        /*.bill-details{*/
        /*    font-size: 12px !important;*/
        /*}*/

        .bill-font {
            font-size: 40px !important;
        }

        .bill-font-2 {
            font-size: 48px !important;
            font-weight: bold;
        }

        .bill-font-3 {
            font-size: 55px !important;
            font-weight: bold;
        }

        #billTable td{
            padding: 0;
        }

    </style>
    <script src="https://cdn.tailwindcss.com"></script>
@endpush
@section('content')
    <section class="bill d-none">
        <div class="receipt bg-white shadow-lg rounded-lg p-4 mx-auto" id="receipt" style="width: 945px;">
            <!-- Header -->
            <div class="text-center mb-2">
                <h2 class="h4 font-weight-bold" style="font-size: 80px;">හන්ගුක් Super</h2>
                <p class="small font-weight-bold" style="font-size: 50px;">එන්න ඔබේ සහන සෙවනට</p>
                <p class="small font-weight-bold" style="font-size: 46px;">No. 23/1, Wadurawa, Veyangoda</p>
                <p class="small font-weight-bold" style="font-size: 46px;">දු.ක. : 0332054327</p>
            </div>

            <!-- Dashed line -->
            <hr style="height: 10px; border: none; border-top: 5px dashed black;">

            <!-- Receipt Details -->
            <div class="mb-3">
                <table class="table table-borderless table-sm">
                    <tr>
                        <td class="font-weight-bold bill-font bill-font-2">දිනය</td>
                        <td class="bill-font-2">: {{ \Carbon\Carbon::today()->format('Y-m-d') }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold bill-font-2">බිල් අංකය</td>
                        <td class="bill-font-2">: #7248</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold bill-font-2">අයකැමි</td>
                        <td class="bill-font-2">: hanguksuper</td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold bill-font-2">ආරම්භක වේලාව</td>
                        <td class="bill-font">: <span class="live-time"></span></td>
                    </tr>
                </table>
            </div>

            <!-- Dashed line -->
            <hr style="border: none; border-top: 2px dashed black;">

            <div class="mb-1">
                <table class="table table-sm" id="printBillTable">
                    <thead>
                    <tr style="border: 10px solid black">
                        <th class="bill-font-3">ප්‍රමාණය</th>
                        <th class="bill-font-3">සිල්ලර මිල</th>
                        <th class="bill-font-3">අපේ මිල</th>
                        <th class="bill-font-3">වටිනාකම</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <!-- Dashed line -->
                <hr style="border: none; border-top: 2px dashed black;">
            </div>

            <!-- Totals and Summary -->
            <div class="mb-2">
                <div class="row">
                    <div class="col-8">
                        <span class="font-weight-bold bill-font-3">සිල්ලර එකතුව</span>
                    </div>
                    <div class="col-4">
                        <span id="printBillNetTotal" class="bill-font-2" style="margin-right: 50px;"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <span class="bill-font-3">වට්ටම්</span>
                    </div>
                    <div class="col-4">
                        <span class="printBillDiscount bill-font-2"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <span class="font-weight-bold bill-font-3">මුළු එකතුව</span>
                    </div>
                    <div class="col-4">
                        <span id="printBillFinalTotal" class="bill-font-2"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <span class="bill-font-3">මුදල් ගෙවීම</span>
                    </div>
                    <div class="col-4">
                        <span id="printBillPayAmo" class="bill-font-2"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <span class="bill-font-3">ඉතිරි මුදල</span>
                    </div>
                    <div class="col-4">
                        <span id="printBillBalance" class="bill-font-2"></span>
                    </div>
                </div>
            </div>

            <!-- Dashed line -->
            <hr style="border: none; border-top: 2px dashed black;">

            <div style="border: 10px solid black; text-align: center;">
                <div class="row justify-content-center">
                    <h2 class="font-weight-bold mt-1 px-2 py-1" style="font-size: 80px; font-weight: bold;">
                        ඔබට ලැබුණු ලාභය රුපියල්
                    </h2>
                </div>
                <div class="row justify-content-center">
                    <span class="printBillDiscount bill-font-2"></span>
                </div>
            </div>


            <!-- Footer -->
            <div class="text-center mt-3 small">
                <p style="font-size: 50px; font-weight: bold;">භාණ්ඩ සංඛ්‍යාව : <span style="font-size: 50px"
                                                                                      id="printBillItemCount">0</span>
                </p>
                <p style="font-size: 50px; font-weight: bold;">වාසි සපිරි සුපිරි තැන</p>
                <p class="font-weight-bold mt-3" style="font-size: 40px;">** CodeXpress Technologies +94 77 767 4308
                    **</p>
            </div>
        </div>
    </section>



    <div id="posSection" class="p-6 space-y-6">
        <!-- Container -->
        {{--<div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg p-4">--}}

        <!-- Header -->
        <div class="flex justify-between items-center bg-green-700 text-white p-3 rounded">
            <div>
                <img src="{{asset('Hanguk_super/assets/IMG/logo/logo.jpeg')}}" alt="logo-dark" class="h-20">
            </div> <!-- logo-dark end -->
            <div>
                <p>Date: {{ \Carbon\Carbon::today()->format('Y-m-d') }}</p>
                <p>Sales No.: 011224_01</p>
            </div>
            <div>
                <p>Time: <span class="live-time"></span></p>
                <p>Cashier:{{$user->first_name}}</p>
            </div>
            {{--        <input type="text" class="bg-green-800 px-4 py-2 rounded" placeholder="Search or Scan">--}}
            <input type="text" class="bg-green-800 px-4 py-2 rounded" style="width: 160px;" id="searchProduct"
                   onkeydown="checkEnter(event)" oninput="itemSuggess()" placeholder="Search for product"
                   onblur="hideSuggestionBox()" onfocus="showSuggestionBox()">
            <div style="width: 330px;
             background-color: rgba(0,255,72,0.75);
             position: absolute;
             z-index: 1000;
             left: 550px;
             top: 100px;
             border: 2px solid green;
             border-radius: 15px; display: none;" id="suggestion-box">
            </div>

            <input type="text" class="bg-green-800 px-4 py-2 rounded " style="width: 160px;" id="membershipID"
                   placeholder="Membership ID" onchange="getMember()">
            <div class="bg-green-600 px-6 py-4 rounded text-lg">Total: Rs.<span class="finalTotal">0</span></div>
        </div>

        <div class="table-responsive" style="height: 300px; overflow-y: auto;">
            <table class="table table-bordered" id="billTable" style="table-layout: fixed;">
                <thead class="bg-green-600">
                <tr>
                    <th class="p-2 text-white">No.</th>
                    <th class="p-2 text-white">Name</th>
                    <th class="p-2 text-white">Price (Rs.)</th>
                    <th class="p-2 text-white">Qty</th>
                    <th class="p-2 text-white">Discount (Rs.)</th>
                    <th class="p-2 text-white">Subtotal (Rs.)</th>
                    <th class="p-2 text-white">Action</th>
                </tr>
                </thead>
                <tbody>
                <!-- Additional rows can be added here -->
                </tbody>
            </table>
        </div>


        <div class="flex justify-between items-center bg-green-700 text-white font-bold text-xl p-3 mt-4 rounded">
            <!-- Summary -->
            <div class="w-1/3 bg-green-700 text-white font-bold text-xl p-3 rounded">
                <div class="flex justify-between">
                    <div>
                        <p>Total Items</p>
                        <p>Net Total</p>
                        <p>Discount</p>
                        <p>Return Amount</p>
                        <p>Total</p>
                    </div>
                    <div class="text-right">
                        <p id="billItemCount">0</p>
                        <p>Rs.<span id="totalAmount">0</span></p>
                        <p>Rs.<span id="totalDiscount">0</span></p>
                        <p>Rs.<span class="return-amount" id="returnAmount">0</span></p>
                        <p>Rs.<span class="finalTotal" id="finalTotal">0</span></p>
                    </div>
                </div>
            </div>

            <!-- Balance Section -->
            <div class="text-center" style="font-size:30px;">
                <p>Balance: Rs.<span id="txtBalance">0</span></p>
            </div>


            <!-- Right Section for Input Field and Tabs -->
            <div class="flex flex-col items-end w-1/3">
                <!-- Input Field and Tabs -->
                <div class="flex items-center mb-2">
                    <!-- Input Fields (Hidden/Shown Based on Tab) -->
                    <div class="mr-4 w-full">
                        <input type="text"
                               id="cashAmount"
                               style="color: black !important;"
                               class="w-full p-2 text-xl border rounded gap-4" placeholder="Cash Amount"
                               oninput="calBalance('cash')"
                        >
                        <input type="text"
                               id="cardNumber"
                               class="w-full p-2 text-xl border rounded gap-4 hidden"
                               style="color: black !important;"
                               placeholder="Card Amount"
                               oninput="calBalance('card')"
                        >
                    </div>

                    <!-- Tabs -->
                    <div class="flex">
                        <button id="cashTab"
                                class="bg-green-400 text-white px-4 py-2 rounded-l-lg text-lg font-bold focus:outline active-tab"
                                onclick="showCashTab()">Cash
                        </button>
                        <button id="cardTab"
                                class="bg-green-600 text-white px-4 py-2 rounded-r-lg text-lg font-bold focus:outline"
                                onclick="showCardTab()">Card
                        </button>
                    </div>
                </div>

                <!-- Payment Button -->
                <button
                    class="bg-[#10A721] text-white py-2 rounded text-lg font-bold focus:outline-none hover:bg-[#062108]"
                    style=width:170px;"
                    onclick="dataSend()"
                >
                    Payment
                </button>

                <!-- Bill Print Button -->
                <button class="bg-[#10A721] text-dark py-2
            rounded text-lg font-bold focus:outline-none
            hover:bg-[#8FD14F]"
                        style="width:170px; background-color: white; color: black; margin-top: 10px;"
                        onclick="printCard()"
                >
                    Bill Print
                </button>

            </div>
        </div>

        <!-- Buttons -->
        <div class="flex justify-between mt-6 space-x-4">
            <div class="flex space-x-1">
                {{--            <button class="bg-green-700 text-white px-6 py-3 rounded" onclick="openModal()">Cash</button>--}}
                {{--            <button class="bg-green-700 text-white px-6 py-3 rounded">Card</button>--}}
                <button class="bg-red-600 text-white px-6 py-3 rounded">Cancel</button>
                <button class="bg-yellow-500 text-white px-6 py-3 rounded" onclick="toggleSection()">Return</button>
            </div>
            <div class="flex space-x-1">
                <a href="{{ route('pos.damage_items') }}">
                    <button class="bg-green-700 text-white px-6 py-3 rounded">Damage Items</button>
                </a>
                <a href="{{ route('pos.stock') }}">
                    <button class="bg-green-700 text-white px-6 py-3 rounded">Stock</button>
                </a>
                <a href="{{ route('pos.reports') }}">
                    <button class="bg-green-700 text-white px-6 py-3 rounded">Reports</button>
                </a>
                <a href="{{ route('pos.members') }}">
                    <button class="bg-green-700 text-white px-6 py-3 rounded">Members</button>
                </a>
                <a href="{{ route('pos.cheque_list') }}">
                    <button class="bg-green-700 text-white px-6 py-3 rounded">Cheques</button>
                </a>
                <ul class="flex items-center justify-center gap-4">
                    <li class="menu-item hidden lg:flex">
                        <div class="hs-dropdown relative inline-flex [--placement:bottom-right] [--trigger:hover]">
                            <a class="hs-dropdown-toggle inline-flex h-12 w-12 flex-shrink-0 items-center justify-center gap-2 rounded-full bg-default-100 align-middle font-medium text-default-700 transition-all after:absolute after:inset-0 hover:text-primary hover:after:-bottom-10"
                               href="#">
                                <i class="ti ti-user text-xl"></i>
                            </a>

                            <div
                                class="hs-dropdown-menu z-10 mt-4 hidden min-w-[200px] overflow-hidden rounded-lg border border-default-100 bg-white pb-1.5 opacity-0 shadow transition-[opacity,margin] hs-dropdown-open:opacity-100 dark:bg-default-50">
                                <ul class="flex flex-col gap-1">
                                    <li class="px-1.5">
                                        <a class="flex items-center rounded-md px-3 py-2 font-normal text-default-600
                                    transition-all hover:bg-red-500/10 hover:text-red-500"
                                           href="{{route('cashier.logout')}}">
                                            <i class="ti ti-logout-2 me-2 text-lg"></i>
                                            Log Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    <!-- Return Section (Initially Hidden) -->
    <div id="returnSection" class="p-6 space-y-6 hidden">
        <!-- Container -->
        <!-- Header -->
        <div class="flex justify-between items-center bg-green-700 text-white p-3 rounded">
            <div>
                <img src="{{asset('Hanguk_super/assets/IMG/logo/logo.jpeg')}}" alt="logo-dark" class="h-20">
            </div> <!-- logo-dark end -->
            <div>
                <p>Date: {{ \Carbon\Carbon::today()->format('Y-m-d') }}</p>
                <p>Return No.: 011224_01</p>
            </div>
            <div>
                <p>Time: <span class="live-time"></span></p>
                <p>Cashier:</p>
            </div>

            <input type="text" class="bg-green-800 px-4 py-2 rounded w-80" id="returnProductSearch"
                   onchange="searchReturnProduct()" placeholder="Search Product">
            <div class="bg-green-600 px-6 py-4 rounded text-lg">Returned Amount: Rs.<span class="return-amount">0</span>
            </div>
        </div>

        <!-- Table -->
        <!-- Table -->
        <div class="table-container-return">
            <table class="w-full border-collapse" id="returnProductTable">
                <thead class="sticky-thead" style="position: sticky; top: 0; z-index: 1;">
                <tr class="bg-green-700 text-white">
                    <th class="p-1 border">No.</th>
                    <th class="p-1 border">Name</th>
                    <th class="p-1 border">Price (Rs.)</th>
                    <th class="p-1 border">Qty</th>
                    <th class="p-1 border">Discount</th>
                    <th class="p-1 border">Subtotal (Rs.)</th>
                    <th class="p-1 border">Action</th>
                </tr>
                </thead>
                <tbody class="min-h-[180px] h-[350px]">
                {{--            ===================================================--}}
                </tbody>

            </table>
        </div>
        {{--    <div class="table-container-return">--}}
        {{--        <table class="w-full border-collapse">--}}
        {{--            <thead class="sticky-thead">--}}
        {{--            <tr class="bg-green-700 text-white">--}}
        {{--                <th class="p-1 border">No.</th>--}}
        {{--                <th class="p-1 border">Name</th>--}}
        {{--                <th class="p-1 border">Price (Rs.)</th>--}}
        {{--                <th class="p-1 border">Qty</th>--}}
        {{--                <th class="p-1 border">Subtotal (Rs.)</th>--}}
        {{--                <th class="p-1 border">Action</th>--}}
        {{--            </tr>--}}
        {{--            </thead>--}}
        {{--            <tbody class="min-h-[180px] h-[350px]">--}}
        {{--            <tr class="text-center">--}}
        {{--                <td colspan="7" class="py-10">No data available</td>--}}
        {{--            </tr>--}}

        {{--            <tr class="text-center">--}}
        {{--                <td class="p-1 border">01</td>--}}
        {{--                <td class="p-1 border">Name_01</td>--}}
        {{--                <td class="p-1 border">500.00</td>--}}
        {{--                <td class="p-1 border"><input type="text" value="1" class="w-10 text-center border p-1"></td>--}}
        {{--                <td class="p-1 border">1000.00</td>--}}
        {{--                <td class="p-1 border text-red-600 cursor-pointer" onclick="deleteRow(this)">❌</td>--}}
        {{--            </tr>--}}

        {{--            <!-- Add more rows as needed -->--}}
        {{--            </tbody>--}}
        {{--        </table>--}}
        {{--    </div>--}}

        <div class="flex justify-between items-center bg-green-700 text-white font-bold text-xl p-3 mt-4 rounded">
            <!-- Summary Section -->
            <div class="flex flex-col p-3 bg-green-700 text-white font-bold rounded">
                <div>
                    <p>Return Items : <span id="returnCount">0</span></p>
                    {{-- <p>Total</p> --}}
                </div>
            </div>

            <!-- Balance Section -->
            <div class="text-center" style="font-size:20px;">
                <p>Return Amount: Rs.<span class="return-amount">0</span></p>
            </div>

            <!-- Right Section for Input Field and Tabs -->
            {{--        <div class="flex flex-col items-end w-1/3">--}}
            {{--            <!-- Input Field and Button -->--}}
            {{--            <div class="flex items-center w-full">--}}
            {{--                <!-- Input Field -->--}}
            {{--                <div class="mr-4 w-full">--}}
            {{--                    <input type="text" id="cashAmount" class="w-full p-2 text-xl border rounded gap-4" placeholder="Return Amount">--}}
            {{--                    --}}{{-- <input type="text" id="cardNumber" class="w-full p-2 text-xl border rounded gap-4 hidden" placeholder="Card Amount"> --}}
            {{--                </div>--}}

            {{--                <!-- Payment Button -->--}}
            {{--                <button class="bg-[#10A721] text-white py-2 px-4 rounded text-lg font-bold focus:outline-none hover:bg-[#062108]" style="width: 200px;">--}}
            {{--                    Add Amount--}}
            {{--                </button>--}}
            {{--            </div>--}}
            {{--        </div>--}}
        </div>


        <!-- Buttons -->
        <div class="flex justify-between mt-6 space-x-4">
            <div class="flex space-x-1">
                <button class="bg-yellow-500 text-white px-6 py-3 rounded" onclick="toggleSection()">Product</button>
                <button class="bg-red-600 text-white px-6 py-3 rounded">Cancel</button>
            </div>
            <div class="flex space-x-1">
                <button class="bg-green-700 text-white px-6 py-3 rounded">Damage Items</button>
                <a href="{{ route("pos.stock") }}">
                    <button class="bg-green-700 text-white px-6 py-3 rounded">Stock</button>
                </a>
                <a href="{{ route("pos.reports") }}">
                    <button class="bg-green-700 text-white px-6 py-3 rounded">Reports</button>
                </a>
                <a href="{{ route("pos.members") }}">
                    <button class="bg-green-700 text-white px-6 py-3 rounded">Members</button>
                </a>
                {{--                <button class="bg-blue-700 text-white px-6 py-3 rounded" onclick="openNumberPadModal()">Number Pad</button>--}}
                <ul class="flex items-center justify-center gap-4">
                    <li class="menu-item hidden lg:flex">
                        <div class="hs-dropdown relative inline-flex [--placement:bottom-right] [--trigger:hover]">
                            <a class="hs-dropdown-toggle inline-flex h-12 w-12 flex-shrink-0 items-center
                        justify-center gap-2 rounded-full bg-default-100 align-middle font-medium text-default-700
                        transition-all after:absolute after:inset-0 hover:text-primary hover:after:-bottom-10" href="#">
                                <i class="ti ti-user text-xl"></i>
                            </a>

                            <div
                                class="hs-dropdown-menu z-10 mt-4 hidden min-w-[200px] overflow-hidden rounded-lg border border-default-100 bg-white pb-1.5 opacity-0 shadow transition-[opacity,margin] hs-dropdown-open:opacity-100 dark:bg-default-50">
                                <ul class="flex flex-col gap-1">
                                    <li class="px-1.5">
                                        <a class="flex items-center rounded-md px-3 py-2 font-normal text-default-600 transition-all hover:bg-red-500/10 hover:text-red-500"
                                           href="auth-login.html"><i class="ti ti-logout-2 me-2 text-lg"></i> Log
                                            Out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Modal -->
    {{--<div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center hidden">--}}
    {{--    <div class="bg-white p-6 rounded-lg shadow-lg w-96">--}}
    {{--        <h2 class="text-xl font-bold mb-4">Add Price</h2>--}}
    {{--        <div class="mb-4">--}}
    {{--            <label for="price" class="block text-sm font-medium text-gray-700">Enter Price</label>--}}
    {{--            <input type="number" id="price" class="mt-1 block w-full p-2 border rounded-md">--}}
    {{--        </div>--}}
    {{--        <div class="mb-4">--}}
    {{--            <button id="activeButton" class="bg-green-700 text-white px-4 py-2 rounded" onclick="toggleActiveField()">Use Card</button>--}}
    {{--        </div>--}}
    {{--        <div id="additionalField" class="mb-4 hidden">--}}
    {{--            <label for="additionalPrice" class="block text-sm font-medium text-gray-700">Additional Price</label>--}}
    {{--            <input type="number" id="additionalPrice" class="mt-1 block w-full p-2 border rounded-md">--}}
    {{--        </div>--}}
    {{--        <div class="flex justify-end space-x-4">--}}
    {{--            <button class="bg-gray-500 text-white px-4 py-2 rounded" onclick="closeModal()">Close</button>--}}
    {{--            <button class="bg-blue-600 text-white px-4 py-2 rounded">Save</button>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--</div>--}}

    <!-- Number Pad Modal -->
    <div id="numberPadModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded-lg p-6 space-y-4 w-80">
            <div class="text-center text-xl font-bold">Number Pad</div>
            <div class="grid grid-cols-3 gap-4">
                <button class="bg-gray-200 p-4 text-xl rounded">7</button>
                <button class="bg-gray-200 p-4 text-xl rounded">8</button>
                <button class="bg-gray-200 p-4 text-xl rounded">9</button>
                <button class="bg-gray-200 p-4 text-xl rounded">4</button>
                <button class="bg-gray-200 p-4 text-xl rounded">5</button>
                <button class="bg-gray-200 p-4 text-xl rounded">6</button>
                <button class="bg-gray-200 p-4 text-xl rounded">1</button>
                <button class="bg-gray-200 p-4 text-xl rounded">2</button>
                <button class="bg-gray-200 p-4 text-xl rounded">3</button>
                <button class="bg-gray-200 p-4 text-xl rounded">0</button>
                <button class="bg-gray-200 p-4 text-xl rounded">.</button>
                <button class="bg-red-500 text-white p-4 text-xl rounded" onclick="closeNumberPadModal()">Close</button>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="{{asset('Hanguk_super/assets/JS/jquary/jquery-3.7.1.min.JS')}}"></script>
    <script>
        function deleteRow(button) {
            // Find the row to be deleted
            var row = button.closest('tr');
            // Remove the row from the table
            row.remove();
        }

        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }

        function toggleActiveField() {
            var additionalField = document.getElementById('additionalField');
            additionalField.classList.toggle('hidden');
        }

        function toggleSection() {
            const posSection = document.getElementById('posSection');
            const returnSection = document.getElementById('returnSection');

            posSection.classList.toggle('hidden');
            returnSection.classList.toggle('hidden');
        }

        function openNumberPadModal() {
            document.getElementById('numberPadModal').classList.remove('hidden');
        }

        function closeNumberPadModal() {
            document.getElementById('numberPadModal').classList.add('hidden');
        }

    </script>
    <script>
        function showCashTab() {
            document.getElementById("cashAmount").classList.remove("hidden");
            document.getElementById("cardNumber").classList.add("hidden");
            document.getElementById("cashTab").classList.add("bg-green-400");
            document.getElementById("cashTab").classList.remove("bg-green-600");
            document.getElementById("cardTab").classList.remove("bg-green-400");
            document.getElementById("cardTab").classList.add("bg-green-600");
        }

        function showCardTab() {
            document.getElementById("cashAmount").classList.add("hidden");
            document.getElementById("cardNumber").classList.remove("hidden");
            document.getElementById("cashTab").classList.remove("bg-green-400");
            document.getElementById("cashTab").classList.add("bg-green-600");
            document.getElementById("cardTab").classList.add("bg-green-400");
            document.getElementById("cardTab").classList.remove("bg-green-600");
        }

        showCashTab();
    </script>

    <script>
        window.onload = function () {
            document.getElementById('searchProduct').focus();
        };
    </script>

    <script>
        let billItem = [];
        let itemCount;
        let memberDetails;
        let hasMember = 0;
        let finalTotal = 0;
        let balance;
        let payType = '';
        let cash;
        let totalDiscount = 0;
        let netTotal = 0;

        async function getMember() {
            let memberID = $('#membershipID').val();

            try {
                const response = await $.ajax({
                    url: "{{ route('get.member') }}",
                    type: 'POST',
                    data: {
                        memberID: memberID,
                        _token: '{{ csrf_token() }}'
                    }
                });

                if (response && Object.keys(response).length > 0) {
                    memberDetails = response;
                    hasMember = 1;
                } else {
                    memberDetails = null;
                    hasMember = 0;
                    Swal.fire({
                        icon: 'warning',
                        title: 'No Membership Found',
                        text: 'The membership ID you entered does not exist. Please try again.',
                        confirmButtonText: 'OK'
                    });
                }

            } catch (error) {
                hasMember = 0;
                console.error('Error fetching member details:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'There was an error fetching the membership details. Please try again later.',
                    confirmButtonText: 'OK'
                });
            }
        }

        function itemSuggess() {
            let productName = $('#searchProduct').val();

            // Ensure the input is not empty before making a request
            if (productName.length > 0) {
                $.ajax({
                    url: "{{ route('pos.suggestions') }}",
                    type: 'POST',
                    data: {
                        name: productName,
                        _token: '{{ csrf_token() }}'
                    }
                })
                    .then(function(response, textStatus, jqXHR) {
                        // This will only run after the AJAX response is received
                        if (jqXHR.status === 200) {
                            let suggestionBox = $('#suggestion-box');
                            suggestionBox.empty();

                            // Ensure response is an array or an object containing an array of products
                            let products = Array.isArray(response) ? response : (response.products || []);

                            console.log(response); // Log the response to check its structure
                            console.log(products); // Log the products array

                            if (products.length > 0) {
                                // Iterate through the products and build suggestion items
                                products.forEach(function(product) {
                                    suggestionBox.append(`
                            <div class="suggestion-item" style="width: 100%; height: 60px; border: 1px solid black; border-radius: 10px; cursor: pointer;" onclick="selectProduct('${product.product_name}', ${product.id})">
                                <h2 style="color: black; text-align: center; font-weight: bold; margin-top: 20px;">${product.product_name}</h2>
                            </div>
                        `);
                                });
                            } else {
                                suggestionBox.append('<div>No products found</div>');
                            }

                            // Ensure the input field remains focused after updating the suggestions
                            $('#searchProduct').focus();
                        }
                    })
                    .catch(function(error) {
                        console.error('Error:', error);
                    });
            } else {
                $('#suggestion-box').empty(); // Clear suggestions when the input is empty
            }
        }





        // Function to select the product from the suggestion box
        function selectProduct(productName, productId) {
            $('#searchProduct').val(productName); // Set the selected product name in the input
            $('#searchProduct').focus(); // Refocus the input field after selection
            $('#suggestion-box').empty(); // Optionally clear the suggestion box after selection
        }

        function checkEnter(event) {
            if (event.key === 'Enter') {
                event.preventDefault();  // Prevent the cursor from jumping to the next text input
                searchProduct();  // Call searchProduct function when Enter is pressed
                $('#searchProduct').focus();  // Ensure the focus stays on the search input
            }
        }

        function searchProduct() {
            // Check if Enter key is pressed'Enter') {
                let productName = $('#searchProduct').val();

                // Keep focus on the search input
                $('#searchProduct').focus();

                // Trigger Ajax call if input is not empty
                if (productName.trim() !== '') {
                    console.log(productName);

                    $.ajax({
                        url: "{{ route('product.scan') }}",
                        type: 'POST',
                        data: {
                            name: productName,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (response, textStatus, jqXHR) {
                            if (jqXHR.status === 200) {
                                itemCount = billItem.length + 1;
                                $('#billItemCount').text(itemCount);

                                // Parse float values to handle decimals correctly
                                let sellingPrice = parseFloat(response.selling_price) || 0;
                                let discountPrice = parseFloat(response.discount_price) || 0;
                                let discount = sellingPrice - discountPrice;
                                let subtotal = discountPrice;

                                // Create a new row with the response data
                                let newRow = `
                                <tr class="text-center" data-id="${response.id}" style="height: 10px;">
                                    <td class="">${itemCount}</td>
                                    <td class="">${response.product_name}</td>
                                    <td class="">${sellingPrice.toFixed(2)}</td>
                                    <td class="">
                                        <input type="text" value="1" class="w-20 text-center border p-1 productQtyCount" onchange="updateTotal(this, ${sellingPrice},${discountPrice})">
                                    </td>
                                    <td class="">${discountPrice.toFixed(2)}</td>
                                    <td class="totalPrice">${subtotal.toFixed(2)}</td>
                                    <td class="text-red-600 cursor-pointer" onclick="deleteRow(this)">❌</td>
                                </tr>
                            `;

                                $('#billTable tbody').append(newRow);

                                // Push item to the billItem array
                                billItem.push({
                                    id: response.id,
                                    item_id: response.item_id,
                                    product_name: response.product_name,
                                    selling_price: sellingPrice,
                                    qty: 1,
                                    discount: discount,
                                    totalDiscount: 0,
                                    subtotal: subtotal,
                                    stock_id: response.id
                                });

                                console.log(billItem);

                                // Update total amount
                                updateTotalAmount();

                                // Clear search input
                                $('#searchProduct').val("");
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Failed!',
                                    text: 'This Product Not Found.',
                                });
                            }
                        },
                        error: function (error) {
                            console.error('Error occurred while searching for product:', error);
                            alert('Failed to fetch product. Please try again.');
                        }
                    });
                }
        }

        function updateTotal(element, sellingPrice, discountPrice) {
            // Parse quantity as a number
            let qty = parseFloat($(element).val()) || 0;  // Fallback to 0 if NaN
            let totalPriceCell = $(element).closest('tr').find('.totalPrice');
            let discountPriceCell = $(element).closest('tr').find('.discountPrice');

            // Calculate the discount per unit and total price
            let unitDiscount = sellingPrice - discountPrice;
            let newTotalPrice = (discountPrice * qty).toFixed(2);
            let newTotalDiscount = (unitDiscount * qty).toFixed(2);

            // Update the UI with the new calculated values
            totalPriceCell.text(newTotalPrice);
            discountPriceCell.text(newTotalDiscount);

            // Find the product in the billItem array by its ID
            let productId = $(element).closest('tr').data('id');
            let product = billItem.find(item => item.id === productId);

            if (product) {
                // Update the corresponding product's quantity and totals
                product.qty = qty;
                product.subtotal = parseFloat(newTotalPrice);
                product.totalDiscount = parseFloat(newTotalDiscount);
            }

            // Recalculate the net total (using discountPrice for accurate totals)
            let netTotal = billItem.reduce((total, item) => total + (item.discount_price * item.qty), 0).toFixed(2);

            // Call the function to update total amounts on the UI
            updateTotalAmount();
        }



        function deleteRow(element) {
            let productId = $(element).closest('tr').data('id');

            billItem = billItem.filter(item => item.id !== productId);
            $(element).closest('tr').remove();
            $('#billItemCount').text(billItem.length);
            updateTotalAmount();
        }

        function updateTotalAmount() {
            let totalAmount = 0;
            let returnAmount = parseFloat($('#returnAmount').text());
            totalDiscount = 0;
            netTotal = 0;

            billItem.forEach(item => {
                netTotal += item.selling_price * item.qty; // Update net total with the correct quantity
                totalAmount += item.subtotal;

                // Calculate total discount
                if (item.totalDiscount == 0) {
                    totalDiscount += item.discount;
                } else {
                    totalDiscount += item.totalDiscount;
                }
            });

            // Apply total discount and return amount for all customers
            finalTotal = netTotal - (totalDiscount + returnAmount);

            $('#totalAmount').text(netTotal.toFixed(2)); // Display updated net total
            $('#totalDiscount').text(totalDiscount.toFixed(2));
            $('.finalTotal').text(finalTotal.toFixed(2));
        }


        function calBalance(paymentType) {
            if (paymentType === 'cash') {
                payType = 'cash';
                cash = $('#cashAmount').val();
                balance = cash - finalTotal;
            } else {
                payType = 'card';
                cash = $('#cardNumber').val();
                balance = cash - finalTotal;
            }

            $('#txtBalance').text(balance.toFixed(2));

        }




        {{--============================== Return Product===========================--}}

        let returnItem = [];
        let returnItemCount;
        let totalReturnAmount = 0;

        function searchReturnProduct() {
            let productName = $('#returnProductSearch').val();

            $.ajax({
                url: "{{ route('product.scan') }}",
                type: 'POST',
                data: {
                    name: productName,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    returnItemCount = returnItem.length + 1;
                    $('#returnCount').text(returnItemCount);

                    let newRow = `
                    <tr class="text-center" data-id="${response.id}">
                        <td class="p-1 border">${returnItemCount}</td>
                        <td class="p-1 border">${response.product_name}</td>
                        <td class="p-1 border">${response.selling_price.toFixed(2)}</td>
                        <td class="p-1 border">
                            <input type="text" value="1" class="w-10 text-center border p-1 productQtyCount" onchange="updateReturnTotal(this, ${response.selling_price})">
                        </td>
                        <td class="p-1 border">${response.discount_price.toFixed(2)}</td>
                        <td class="p-1 border totalPrice">${(response.selling_price * 1).toFixed(2)}</td>
                        <td class="p-1 border text-red-600 cursor-pointer" onclick="deleteReturnRow(this)">❌</td>
                    </tr>
                `;

                    $('#returnProductTable tbody').append(newRow);

                    returnItem.push({
                        id: response.id,
                        product_name: response.product_name,
                        selling_price: response.selling_price,
                        qty: 1,
                        discount_price: response.discount_price,
                        subtotal: response.selling_price * 1
                    });

                    // Update total amount
                    updateTotalReturnAmount();

                    $('#returnProductSearch').val("");
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }

        function updateReturnTotal(element, sellingPrice) {
            let qty = parseFloat($(element).val());
            let totalPriceCell = $(element).closest('tr').find('.totalPrice');
            let newTotalPrice = (sellingPrice * qty).toFixed(2);

            totalPriceCell.text(newTotalPrice);

            let productId = $(element).closest('tr').data('id');
            let product = returnItem.find(item => item.id === productId);
            if (product) {
                product.qty = qty;
                product.subtotal = parseFloat(newTotalPrice);
            }

            updateTotalReturnAmount();
        }

        function deleteReturnRow(element) {
            let productId = $(element).closest('tr').data('id');

            returnItem = returnItem.filter(item => item.id !== productId);
            $(element).closest('tr').remove();
            $('#billItemCount').text(returnItem.length);
            updateTotalReturnAmount();
        }

        function updateTotalReturnAmount() {
            // Initialize totalReturnAmount to 0
            totalReturnAmount = 0;

            console.log(returnItem);

            // Calculate the total return amount by summing up the subtotal of each item
            returnItem.forEach(item => {
                totalReturnAmount += item.subtotal; // Correctly add each item's subtotal
            });

            // Display the total return amount with 2 decimal points
            $('.return-amount').text(totalReturnAmount.toFixed(2));
        }

        function dataSend() {
            $.ajax({
                url: "{{ route('order.save') }}",
                type: 'POST',
                data: {
                    item: billItem,
                    netTotal: finalTotal,
                    pay_amount: cash,
                    balance: balance,
                    customer_id: memberDetails,
                    return_amount: totalReturnAmount,
                    discount_amount: totalDiscount,
                    type: payType,
                    returnItem: returnItem,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response, textStatus, xhr) {
                    // Check if the status code is 200
                    if (xhr.status === 200) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Order saved successfully.',
                            timer: 800,
                            showConfirmButton: false,
                        });

                        // Clear all variables and arrays
                        billItem = [];
                        itemCount = 0;
                        memberDetails = null;
                        hasMember = 0;
                        finalTotal = 0;
                        balance = 0;
                        payType = '';
                        cash = 0;
                        totalDiscount = 0;
                        returnItem = [];
                        returnItemCount = 0;
                        totalReturnAmount = 0;

                        // Clear all input fields
                        $('#membershipID').val("");
                        $('#searchProduct').val("");
                        $('#cashAmount').val("");
                        $('#cardNumber').val("");
                        $('#returnProductSearch').val("");

                        // Clear dynamic content in the DOM
                        $('#billTable tbody').empty();
                        $('#returnProductTable tbody').empty();
                        $('#billItemCount').text('0');
                        $('#returnCount').text('0');
                        $('#totalAmount').text('0.00');
                        $('#totalDiscount').text('0.00');
                        $('.finalTotal').text('0.00');
                        $('.return-amount').text('0.00');
                        $('#txtBalance').text('0.00');

                        document.getElementById('searchProduct').focus();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: 'Something went wrong. Please try again.',
                        });
                    }
                },
                error: function (xhr) {
                    // Handle error if AJAX request fails
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed!',
                        text: 'Something went wrong. Please try again.',
                    });
                }
            });
        }

        function printCard() {
            let sellprice = 0;
            console.log(billItem);
            billItem.forEach((item, index) => {
                // Calculate sell price based on membership status
                if (hasMember == 1) {
                    sellprice = item.selling_price - item.discount;
                } else {
                    sellprice = item.selling_price;
                }

                // Create the new row for each item
                let newRow = `
            <tr>

                <td class="bill-font" colspan="4" style="text-align: left">${index + 1}.${item.product_name}</td>
            </tr>
            <tr class="">
                <td class="bill-font" style="padding-left: 50px;">${item.qty}</td>

                <td class="bill-font">${item.selling_price}</td>
                <td class="bill-font">${item.selling_price - item.discount}</td>
                <td class="bill-font">${item.subtotal.toFixed(2)}</td>
            </tr>
        `;
                // Append the new row to the table body
                $('#printBillTable tbody').append(newRow);
            });
            $('#printBillItemCount').text(itemCount);
            $('#printBillNetTotal').text('රු ' + netTotal);
            $('.printBillDiscount').text('රු ' + totalDiscount);
            $('#printBillFinalTotal').text('රු ' + finalTotal);
            $('#printBillPayAmo').text('රු ' + cash);
            $('#printBillBalance').text('රු ' + balance);


            dataSend();

            var originalContent = document.body.innerHTML;
            var printContent = document.getElementById("receipt").innerHTML;
            document.body.innerHTML = printContent;
            window.print();
            document.body.innerHTML = originalContent;
            window.location.reload();
        }


    </script>


    {{--    ===================================================================================================--}}

    <script>
        function updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const timeString = `${hours}:${minutes}:${seconds}`;

            // Select all elements with the class 'live-time'
            const elements = document.querySelectorAll('.live-time');

            // Update the text content for each element
            elements.forEach(element => {
                element.textContent = timeString;
            });
        }

        setInterval(updateTime, 1000);
        updateTime();
    </script>

    <script>


        function hideSuggestionBox() {
            setTimeout(function () {
                document.getElementById('suggestion-box').style.display = 'none';  // Hide suggestion box after losing focus
            }, 200); // Delay to allow for item selection before hiding
        }

        function showSuggestionBox() {
            document.getElementById('suggestion-box').style.display = 'block';  // Show the suggestion box again when input is focused
        }

        // Optional: If you want to hide the box when clicking outside of the input and suggestion box
        document.addEventListener('click', function (event) {
            const suggestionBox = document.getElementById('suggestion-box');
            const searchInput = document.getElementById('searchProduct');

            if (!suggestionBox.contains(event.target) && !searchInput.contains(event.target)) {
                suggestionBox.style.display = 'none';  // Hide if clicked outside the input and suggestion box
            }
        });
    </script>

@endpush





