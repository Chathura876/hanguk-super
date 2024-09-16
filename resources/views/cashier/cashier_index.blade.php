@extends('cashier.cashier_app')
@push('CSS')

<style>
    /* Ensure the rest of the page fits within the viewport */
    #posSection {
        max-height: calc(100vh - 50px); /* Adjust the offset as needed */
        overflow: hidden;
    }

    .table-container {
        max-height: 250px; /* Set your desired max height */
        overflow-y: auto;  /* Enable vertical scrolling */
        overflow-x: hidden; /* Prevent horizontal scrolling */
        position: relative; /* Create a containing block for sticky elements */
    }

    .table-container-return {
        max-height: 320px; /* Set your desired max height */
        overflow-y: auto;  /* Enable vertical scrolling */
        overflow-x: hidden; /* Prevent horizontal scrolling */
        position: relative; /* Create a containing block for sticky elements */
    }

    .sticky-thead {
        position: sticky;
        top: 0; /* Stick the thead to the top of the table container */
        z-index: 2; /* Ensure it appears above the tbody content */
        background-color: #2d6a4f; /* Background color to match your header */
    }

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

    #billTable{
        height: 200px;
    }

    #billTable tbody tr{
        height: 60px;
    }
    @media print {
        .receipt {
            width: 7.8cm; /* Set the width to 7.8cm */
            padding: 0;
            margin: 0;
            font-size: 12px; /* Adjust the font size for readability */
        }

        /* Additional styles to control layout on print */
        .max-w-sm {
            max-width: 100%;
        }

        .no-print {
            display: none; /* Hide any elements not needed for printing */
        }
    }
    th{
        font-size: 12px;
    }
    .bill-details{
        font-size: 12px !important;
    }

</style>
    <script src="https://cdn.tailwindcss.com"></script>
@endpush
@section('content')
    <section class="bill d-none">
        <div class="receipt max-w-sm bg-white shadow-lg rounded-lg p-4" id="receipt" style="width: 7.8cm">
            <!-- Header -->
            <div class="items-center">
                <!-- Right Column: Text -->
                <div class="text-center">
                    <h2 class="text-2xl font-bold mt-4">හන්ගුක් Super</h2>
                    <p class="text-xs font-bold">එන්න ඔබේ සහන සෙවනට</p>
                    <p class="text-xs font-bold">No. 23/1, Wadurawa, Veyangoda</p>
                    <p class="text-xs font-bold mt-2">දු.ක. : 0332054327</p>
                </div>
            </div>

            <hr class="border-t-2 border-dashed border-gray-600 my-4">

            <!-- Receipt Details -->
            <div class="mt-4">
                <table class="text-sm">
                    <tr>
                        <td class="font-bold bill-details">දිනය </td>
                        <td>: {{ \Carbon\Carbon::today()->format('Y-m-d') }}</td>
                    </tr>
                    <tr>
                        <td class="font-bold bill-details">බිල් අංකය </td>
                        <td>: #7248</td>
                    </tr>
                    <tr>
                        <td class="font-bold bill-details">අයකැමි </td>
                        <td>: hanguksuper</td>
                    </tr>
                    <tr>
                        <td class="font-bold bill-details">පාරිභෝගිකයා </td>
                        <td>: Walk in Customer</td>
                    </tr>
                    <tr>
                        <td class="font-bold bill-details">ආරම්භක වේලාව </td>
                        <td>: <span class="live-time"></span></td>
                    </tr>
                </table>
            </div>

            <hr class="border-t-2 border-dashed border-gray-600 mt-4">

            <!-- Items Table -->
            <table class="w-full text-sm border-collapse" id="printBillTable">
                <thead>
                <tr>
                    <th class="border-0 px-1 py-1 bill-details">ප්‍රමාණය</th>
                    <th class="border-0 px-1 py-1 bill-details">සිල්ලර මිල</th>
                    <th class="border-0 px-1 py-1 bill-details">අපේ මිල</th>
                    <th class="border-0 px-1 py-1 bill-details">වටිනාකම</th>
                </tr>
                <tr>
                    <td colspan="5" class="border-0 p-0"><hr class="border-t-2 border-dashed border-gray-600 my-0"></td>
                </tr>
                </thead>
                <tbody class="text-center">
{{--                <tr>--}}
{{--                    <td class="border-0 px-2 py-1" style="text-align: left">1.</td>--}}
{{--                    <td class="border-0 px-2 py-1" colspan="3" style="text-align: left">Kotmale Fresh Milk</td>--}}
{{--                </tr>--}}
{{--                <tr style="margin-left: 30px;">--}}
{{--                    <td class="border-0 px-2 py-1">1</td>--}}
{{--                    <td class="border-0 px-2 py-1">500.00</td>--}}
{{--                    <td class="border-0 px-2 py-1">500.00</td>--}}
{{--                    <td class="border-0 px-2 py-1">500.00</td>--}}
{{--                </tr>--}}
                </tbody>
            </table>

            <hr class="border-t-2 border-dashed border-gray-600 mt-4">

            <!-- Totals and Summary -->
            <div class="mt-4">
                <div class="flex justify-between">
                    <span class="bill-details">සිල්ලර එකතුව</span>
                    <span class="bill-details" id="printBillNetTotal"></span>
                </div>
                <div class="flex justify-between">
                    <span class="bill-details">වට්ටම්</span>
                    <span class="bill-details printBillDiscount"></span>
                </div>
                <div class="flex justify-between">
                    <span class="font-bold bill-details">මුළු එකතුව</span>
                    <span class="bill-details" id="printBillFinalTotal"></span>
                </div>
                <div class="flex justify-between">
                    <span class="bill-details">මුදල් ගෙවීම</span>
                    <span class="bill-details" id="printBillPayAmo"></span>
                </div>
                <div class="flex justify-between">
                    <span class="bill-details">ඉතිරි මුදල</span>
                    <span class="bill-details" id="printBillBalance"></span>
                </div>
            </div>

            <hr class="border-t-2 border-dashed border-gray-600 mt-4">

            <h2 class="text-center font-bold border-2 border-black mt-4">ඔබට ලැබුණු ලාභය රුපියල් : <span class="printBillDiscount"></span></h2>

            <!-- Footer -->
            <div class="mt-4 text-center text-sm">
                <p>භාණ්ඩ සංඛ්‍යාව : <span id="printBillItemCount">0</span></p>
                <p>වාසි සපිරි සුපිරි තැන</p>
{{--                <p class="mt-2">අවසන් වේලාව : 04.58.04 PM</p>--}}
                <p class="mt-4 font-bold">** CodeXpress Technologies +94 77 767 4308**</p>
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
            <p>Cashier:</p>
        </div>
{{--        <input type="text" class="bg-green-800 px-4 py-2 rounded" placeholder="Search or Scan">--}}
        <input type="text" class="bg-green-800 px-4 py-2 rounded w-80" id="searchProduct" onchange="searchProduct()" placeholder="Search for product">
        <input type="text" class="bg-green-800 px-4 py-2 rounded w-80" id="membershipID" placeholder="Membership ID" onchange="getMember()">
        <div class="bg-green-600 px-6 py-4 rounded text-lg">Total: Rs.<span class="finalTotal">0</span></div>
    </div>

    <!-- Table -->
{{--    <div class="table-container">--}}
{{--        <table class="w-full border-collapse" id="billTable" >--}}
{{--            <thead class="sticky-thead">--}}
{{--            <tr class="bg-green-700 text-white">--}}
{{--                <th class="p-1 border">No.</th>--}}
{{--                <th class="p-1 border">Name</th>--}}
{{--                <th class="p-1 border">Price (Rs.)</th>--}}
{{--                <th class="p-1 border">Qty</th>--}}
{{--                <th class="p-1 border">Discount (Rs.)</th>--}}
{{--                <th class="p-1 border">Subtotal (Rs.)</th>--}}
{{--                <th class="p-1 border">Action</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody class="min-h-[180px] h-[175px]">--}}
{{--                <tr class="text-center">--}}
{{--                    <td colspan="7" class="py-10">No data available</td>--}}
{{--                </tr>--}}
{{--                <tr class="text-center">--}}
{{--                    <td class="p-1 border">01</td>--}}
{{--                    <td class="p-1 border">Name_01</td>--}}
{{--                    <td class="p-1 border">500.00</td>--}}
{{--                    <td class="p-1 border"><input type="text" value="1" class="w-10 text-center border p-1"></td>--}}
{{--                    <td class="p-1 border">1000.00</td>--}}
{{--                    <td class="p-1 border">1000.00</td>--}}
{{--                    <td class="p-1 border text-red-600 cursor-pointer" onclick="deleteRow(this)">❌</td>--}}
{{--                </tr>--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}
        <div class="">
            <table class="w-full border-collapse" id="billTable">
                <thead class="sticky-thead">
                <tr class="bg-green-700 text-white">
                    <th class="p-1 border">No.</th>
                    <th class="p-1 border">Name</th>
                    <th class="p-1 border">Price (Rs.)</th>
                    <th class="p-1 border">Qty</th>
                    <th class="p-1 border">Discount (Rs.)</th>
                    <th class="p-1 border">Subtotal (Rs.)</th>
                    <th class="p-1 border">Action</th>
                </tr>
                </thead>
{{--                 <tbody class="min-h-[180px] h-[175px]">--}}
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
                           onchange="calBalance('card')"
                    >
                </div>

                <!-- Tabs -->
                <div class="flex">
                    <button id="cashTab" class="bg-green-400 text-white px-4 py-2 rounded-l-lg text-lg font-bold focus:outline active-tab" onclick="showCashTab()">Cash</button>
                    <button id="cardTab" class="bg-green-600 text-white px-4 py-2 rounded-r-lg text-lg font-bold focus:outline" onclick="showCardTab()">Card</button>
                </div>
            </div>

            <!-- Payment Button -->
            <button class="bg-[#10A721] text-white py-2 rounded text-lg font-bold focus:outline-none hover:bg-[#062108]"
                    style=width:446px;"
                    onclick="dataSend()"
            >
                Payment
            </button>

            <!-- Bill Print Button -->
            <button class="bg-[#10A721] text-white py-2
            rounded text-lg font-bold focus:outline-none
            hover:bg-[#8FD14F]"
            style="width:446px; background-color: white; color: black; margin-top: 10px;"
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
            <a href="{{ route('pos.damage_items') }}"><button class="bg-green-700 text-white px-6 py-3 rounded">Damage Items</button></a>
            <a href="{{ route('pos.stock') }}"><button class="bg-green-700 text-white px-6 py-3 rounded">Stock</button></a>
            <a href="{{ route('pos.reports') }}"><button class="bg-green-700 text-white px-6 py-3 rounded">Reports</button></a>
            <a href="{{ route('pos.members') }}"><button class="bg-green-700 text-white px-6 py-3 rounded">Members</button></a>
            <a href="{{ route('pos.cheque_list') }}"><button class="bg-green-700 text-white px-6 py-3 rounded">Cheques</button></a>
            <ul class="flex items-center justify-center gap-4">
                <li class="menu-item hidden lg:flex">
                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right] [--trigger:hover]">
                        <a class="hs-dropdown-toggle inline-flex h-12 w-12 flex-shrink-0 items-center justify-center gap-2 rounded-full bg-default-100 align-middle font-medium text-default-700 transition-all after:absolute after:inset-0 hover:text-primary hover:after:-bottom-10" href="#">
                            <i class="ti ti-user text-xl"></i>
                        </a>

                        <div class="hs-dropdown-menu z-10 mt-4 hidden min-w-[200px] overflow-hidden rounded-lg border border-default-100 bg-white pb-1.5 opacity-0 shadow transition-[opacity,margin] hs-dropdown-open:opacity-100 dark:bg-default-50">
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

        <input type="text" class="bg-green-800 px-4 py-2 rounded w-80" id="returnProductSearch" onchange="searchReturnProduct()" placeholder="Search Product">
        <div class="bg-green-600 px-6 py-4 rounded text-lg">Returned Amount: Rs.<span class="return-amount">0</span></div>
        </div>

    <!-- Table -->
    <!-- Table -->
    <div class="table-container-return">
        <table class="w-full border-collapse" id="returnProductTable">
            <thead class="sticky-thead">
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
            <a href="{{ route("pos.stock") }}"><button class="bg-green-700 text-white px-6 py-3 rounded">Stock</button></a>
            <a href="{{ route("pos.reports") }}"><button class="bg-green-700 text-white px-6 py-3 rounded">Reports</button></a>
            <a href="{{ route("pos.members") }}"><button class="bg-green-700 text-white px-6 py-3 rounded">Members</button></a>
{{--                <button class="bg-blue-700 text-white px-6 py-3 rounded" onclick="openNumberPadModal()">Number Pad</button>--}}
            <ul class="flex items-center justify-center gap-4">
                <li class="menu-item hidden lg:flex">
                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right] [--trigger:hover]">
                        <a class="hs-dropdown-toggle inline-flex h-12 w-12 flex-shrink-0 items-center
                        justify-center gap-2 rounded-full bg-default-100 align-middle font-medium text-default-700
                        transition-all after:absolute after:inset-0 hover:text-primary hover:after:-bottom-10" href="#">
                            <i class="ti ti-user text-xl"></i>
                        </a>

                        <div class="hs-dropdown-menu z-10 mt-4 hidden min-w-[200px] overflow-hidden rounded-lg border border-default-100 bg-white pb-1.5 opacity-0 shadow transition-[opacity,margin] hs-dropdown-open:opacity-100 dark:bg-default-50">
                            <ul class="flex flex-col gap-1">
                                <li class="px-1.5">
                                    <a class="flex items-center rounded-md px-3 py-2 font-normal text-default-600 transition-all hover:bg-red-500/10 hover:text-red-500" href="auth-login.html"><i class="ti ti-logout-2 me-2 text-lg"></i> Log Out</a>
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
        window.onload = function() {
            document.getElementById('searchProduct').focus();
        };
    </script>

    <script>
        let billItem = [];
        let itemCount;
        let memberDetails;
        let hasMember = 0;
        let finalTotal=0;
        let balance;
        let payType='';
        let cash;
        let totalDiscount = 0;
        let netTotal=0;

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

        function searchProduct() {
            let productName = $('#searchProduct').val();

            $.ajax({
                url: "{{ route('product.scan') }}",
                type: 'POST',
                data: {
                    name: productName,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response, textStatus, jqXHR) {
                    if (jqXHR.status === 200) {
                        itemCount = billItem.length + 1;
                        $('#billItemCount').text(itemCount);

                        // Parse float values to handle decimals correctly
                        let sellingPrice = parseFloat(response.selling_price) || 0;
                        let discountPrice = parseFloat(response.discount_price) || 0;
                        let discount = hasMember == 1 ? sellingPrice - discountPrice : 0;
                        let subtotal = hasMember == 1 ? discountPrice : sellingPrice;

                        // Create a new row with the response data
                        let newRow = `
                    <tr class="text-center" data-id="${response.id}" style="height: 60px;">
                        <td class="p-1 border">${itemCount}</td>
                        <td class="p-1 border">${response.product_name}</td>
                        <td class="p-1 border">${sellingPrice.toFixed(2)}</td>
                        <td class="p-1 border">
                            <input type="text" value="1" class="w-10 text-center border p-1 productQtyCount" onchange="updateTotal(this, ${sellingPrice},${discountPrice})">
                        </td>
                        <td class="p-1 border">${discountPrice.toFixed(2)}</td>
                        <td class="p-1 border totalPrice">${subtotal.toFixed(2)}</td>
                        <td class="p-1 border text-red-600 cursor-pointer" onclick="deleteRow(this)">❌</td>
                    </tr>
                `;

                        $('#billTable tbody').append(newRow);

                        // Push item to the billItem array
                        billItem.push({
                            id: response.id,
                            item_id:response.item_id,
                            product_name: response.product_name,
                            selling_price: sellingPrice,
                            qty: 1,
                            discount: discount,
                            totalDiscount : 0,
                            subtotal: subtotal,
                            stock_id:response.id
                        });

                        console.log(billItem);
                        // Update total amount
                        updateTotalAmount();

                        // Clear search input
                        $('#searchProduct').val("");
                    }
                    else{
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed!',
                            text: 'This Product Not Found.',
                        });
                    }
                },
                error: function(error) {
                    console.error('Error occurred while searching for product:', error);
                    alert('Failed to fetch product. Please try again.');
                }
            });
        }



        function updateTotal(element, sellingPrice, discountPrice) {
            let qty = parseFloat($(element).val());
            let totalPriceCell = $(element).closest('tr').find('.totalPrice');
            let discountPriceCell = $(element).closest('tr').find('.discountPrice');
            let unitDiscount = sellingPrice - discountPrice;
            let newTotalPrice;
            let newTotalDiscount = 0;

            if (hasMember === 1) {
                newTotalPrice = (discountPrice * qty).toFixed(2);
                newTotalDiscount = (unitDiscount * qty).toFixed(2);
            } else {
                newTotalPrice = (sellingPrice * qty).toFixed(2);
            }

            totalPriceCell.text(newTotalPrice);
            discountPriceCell.text(newTotalDiscount);

            let productId = $(element).closest('tr').data('id');
            let product = billItem.find(item => item.id === productId);

            if (product) {
                product.qty = qty;
                product.subtotal = parseFloat(newTotalPrice);
                product.totalDiscount = parseFloat(newTotalDiscount);
            }

            // Update netTotal dynamically based on quantity change
            netTotal = billItem.reduce((total, item) => total + (item.selling_price * item.qty), 0);

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
                if (item.totalDiscount == 0) {
                    totalDiscount += item.discount;
                } else {
                    totalDiscount += item.totalDiscount;
                }
            });

            if (hasMember == 0) {
                finalTotal = totalAmount - (totalDiscount + returnAmount);
            } else {
                finalTotal = totalAmount - returnAmount;
            }

            $('#totalAmount').text(netTotal.toFixed(2)); // Display updated net total
            $('#totalDiscount').text(totalDiscount.toFixed(2));
            $('.finalTotal').text(finalTotal.toFixed(2));
        }



        function calBalance(paymentType){
            if (paymentType === 'cash'){
                payType='cash';
                cash = $('#cashAmount').val();
                balance = cash-finalTotal;
            }
            else {
                payType='card';
                let cash = $('#cardNumber').val();
                balance = cash-finalTotal;
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
                success: function(response) {
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
                error: function(error) {
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
            let sellprice=0;
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
                <td class="border-0 px-2 py-1" style="text-align: left">${index + 1}.</td>
                <td class="border-0 px-2 py-1" colspan="3" style="text-align: left">${item.product_name}</td>
            </tr>
            <tr>
                <td class="border-0 px-2 py-1">${item.qty}</td>
                <td class="border-0 px-2 py-1">${item.selling_price}</td>
                <td class="border-0 px-2 py-1">${sellprice.toFixed(2)}</td>
                <td class="border-0 px-2 py-1">${item.subtotal.toFixed(2)}</td>
            </tr>
        `;
                // Append the new row to the table body
                $('#printBillTable tbody').append(newRow);
            });
            $('#printBillItemCount').text(itemCount);
            $('#printBillNetTotal').text(netTotal);
            $('.printBillDiscount').text(totalDiscount);
            $('#printBillFinalTotal').text(finalTotal);
            $('#printBillPayAmo').text(cash);
            $('#printBillBalance').text(balance);

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


@endpush





