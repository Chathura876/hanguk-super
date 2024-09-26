
@extends('cashier.cashier_app')

@push('CSS')
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

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

    <div id="posSection" class="p-4">
        <!-- Container -->
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center text-white p-3 rounded" style="background-color: #15803d">
            <div>
                <img src="{{asset('Hanguk_super/assets/img/logo/logo.jpeg')}}" alt="logo-dark" class="h-20">
            </div> <!-- logo-dark end -->
            <div>
                <p>Date: {{ \Carbon\Carbon::today()->format('Y-m-d') }}</p>
                <p>Sales No.: 011224_01</p>
            </div>
            <div>
                <p>Time: <span id="live-time"></span></p>
                <p>Cashier:</p>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Search for product" style="width: 200px">
                </div>
            </div>
            <div class="bg-success px-4 py-2 rounded text-lg">Total: Rs.<span class="finalTotal">0</span></div>
        </div>

        <div class="table-responsive" style="height: 300px; overflow-y: auto;">
            <table class="table table-bordered" id="billTable">
                <thead class="sticky-thead text-white" style="background-color: #15803d">
                <tr>
                    <th class="p-1">No.</th>
                    <th class="p-1">Name</th>
                    <th class="p-1">Stock Price (Rs.)</th>
                    <th class="p-1">Selling Price (Rs.)</th>
                    <th class="p-1">Discount (Rs.)</th>
                    <th class="p-1">Qty</th>
                    <th class="p-1">Free Item</th>
                    <th class="p-1">Subtotal (Rs.)</th>
                    <th class="p-1">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="p-1"><input type="text" class="form-control" name="no[]" readonly value="1"></td>
                    <td class="p-1"><input type="text" class="form-control" name="name[]"></td>
                    <td class="p-1"><input type="number" class="form-control" name="stock_price[]" step="0.01"></td>
                    <td class="p-1"><input type="number" class="form-control" name="selling_price[]" step="0.01"></td>
                    <td class="p-1"><input type="number" class="form-control" name="discount[]" step="0.01"></td>
                    <td class="p-1"><input type="number" class="form-control" name="quantity[]" min="1"></td>
                    <td class="p-1"><input type="text" class="form-control" name="free_item[]"></td>
                    <td class="p-1"><input type="number" class="form-control" name="subtotal[]" step="0.01" readonly></td>
                   <td class="p-1">
                        <button type="button" class="btn btn-danger remove-item">Remove</button>
                    </td>
                </tr>
                <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>


        <div class="d-flex justify-content-between align-items-center text-white font-weight-bold text-xl p-3 mt-4 rounded" style="background-color: #15803d">
            <!-- Summary -->
            <div class="w-25">
                <div class="d-flex justify-content-between">
                    <div>
                        <p class="mb-1">Total Items</p>
                        <p class="mb-1">Net Total</p>
                        <p class="mb-1">Discount</p>
                        <p class="mb-1">Return Amount</p>
                        <p class="mb-1">Total</p>
                        <p class="mb-1">Balance: Rs.</p>
                    </div>
                    <div class="text-right">
                        <p id="billItemCount" class="mb-1">0</p>
                        <p class="mb-1">Rs.<span id="totalAmount">0</span></p>
                        <p class="mb-1">Rs.<span id="totalDiscount">0</span></p>
                        <p class="mb-1">Rs.<span class="return-amount" id="returnAmount">0</span></p>
                        <p class="mb-1">Rs.<span class="finalTotal" id="finalTotal">0</span></p>
                        <p class="mb-1">Rs.<span id="txtBalance">0</span></p>
                    </div>
                </div>
            </div>


            <!-- Right Section for Input Field and Tabs -->
            <div class="d-flex flex-column align-items-end w-25">
                <!-- Input Field and Tabs -->
                <div class="d-flex mb-2 w-100">
                    <div class="me-4 w-100">
                        <input type="text" id="cashAmount" class="form-control text-xl" placeholder="Cash Amount" onchange="calBalance('cash')">
                        <input type="text" id="cardNumber" class="form-control text-xl mt-2 d-none" placeholder="Card Amount" onchange="calBalance('card')">
                    </div>

                    <!-- Tabs -->
                    <div class="btn-group" role="group" aria-label="Payment Method">
                        <button id="cashTab" class="btn" style="background-color: #4ade80">Cash</button>
                        <button id="cardTab" class="btn" data-bs-toggle="modal" data-bs-target="#chequeModal" style="background-color: #16a34a">Cheque</button>
                    </div>
                </div>


                <!-- Modal Structure -->
                <div class="modal fade" id="chequeModal" tabindex="-1" aria-labelledby="chequeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg"> <!-- modal-lg for large size modal -->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="chequeModalLabel" style="color: black;">Add Cheque</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Cheque Form -->
                                <form action="
                                {{ route('cheque.store') }}" method="POST">
                                    @csrf
                                    <div class="grid lg:grid-cols-2 gap-6 mb-6">
                                        <!-- Cheque Number -->
                                        <div>
                                            <label class="block text-sm font-medium mb-2" for="number" style="color: black;">Cheque Number</label>
                                            <input id="number" name="number" class="block w-full rounded-md py-2.5 px-4 text-black text-sm border border-black focus:ring-black" type="text" placeholder="Add Cheque Number" required>
                                        </div>

                                        <!-- Bank Name -->
                                        <div>
                                            <label class="block text-sm font-medium mb-2" for="bank" style="color: black;">Bank Name</label>
                                            <input id="bank" name="bank" class="block w-full rounded-md py-2.5 px-4 text-black text-sm border border-black focus:ring-black" type="text" placeholder="Add Bank Name" required>
                                        </div>

                                        <!-- Company Name -->
                                        <div>
                                            <label class="block text-sm font-medium mb-2" for="company" style="color: black;">Company Name</label>
                                            <input id="company" name="company" class="block w-full rounded-md py-2.5 px-4 text-black text-sm border border-black focus:ring-black" type="text" placeholder="Add Company Name" required>
                                        </div>

                                        <!-- Amount -->
                                        <div>
                                            <label class="block text-sm font-medium mb-2" for="amount" style="color: black;">Amount</label>
                                            <input id="amount" name="amount" class="block w-full rounded-md py-2.5 px-4 text-black text-sm border border-black focus:ring-black" type="number" placeholder="Add Amount" required>
                                        </div>

                                        <!-- Issued Date -->
                                        <div>
                                            <label class="block text-sm font-medium mb-2" for="issued_date" style="color: black;">Issued Date</label>
                                            <input id="issued_date" name="issued_date" class="block w-full rounded-md py-2.5 px-4 text-black text-sm border border-black focus:ring-black" type="date" required>
                                        </div>

                                        <!-- Date Written on Cheque -->
                                        <div>
                                            <label class="block text-sm font-medium mb-2" for="written_date" style="color: black;">Date Written on the Cheque</label>
                                            <input id="written_date" name="written_date" class="block w-full rounded-md py-2.5 px-4 text-black text-sm border border-black focus:ring-black" type="date" required>
                                        </div>

                                        <!-- Collected By -->
                                        <div>
                                            <label class="block text-sm font-medium mb-2" for="collect_by" style="color: black;">Collected By</label>
                                            <input id="collect_by" name="collect_by" class="block w-full rounded-md py-2.5 px-4 text-black text-sm border border-black focus:ring-black" type="text" placeholder="Add Collected By">
                                        </div>

                                        <div class="flex items-center">
                                            <input name="status" class="sr-only" type="checkbox" id="flexSwitchCheckDefault">
                                            <div class="flex items-center cursor-pointer" onclick="toggleSwitch()">
                                                <div class="relative inline-block w-12">
                                                    <div class="block bg-default-200 w-full h-6 rounded-full border-2 border-black"></div>
                                                    <div class="dot absolute left-1 top-1 bg-black w-4 h-4 rounded-full transition-transform duration-200" id="toggleDot"></div>
                                                </div>
                                                <span class="ms-2" id="statusText" style="color: black;">No</span>
                                            </div>
                                            <label class="ms-1.5 mx-5" for="flexSwitchCheckDefault" style="color: black;">Money Collected</label>
                                        </div>

                                        <script>
                                            const checkbox = document.getElementById('flexSwitchCheckDefault');
                                            const statusText = document.getElementById('statusText');
                                            const toggleDot = document.getElementById('toggleDot');

                                            function toggleSwitch() {
                                                checkbox.checked = !checkbox.checked;
                                                updateStatus();
                                            }

                                            function updateStatus() {
                                                if (checkbox.checked) {
                                                    statusText.textContent = 'Yes';
                                                    statusText.style.color = 'green'; // Change text color for "Yes"
                                                    toggleDot.style.transform = 'translateX(1.5rem)'; // Move dot to the right
                                                } else {
                                                    statusText.textContent = 'No';
                                                    statusText.style.color = 'red'; // Change text color for "No"
                                                    toggleDot.style.transform = 'translateX(0)'; // Move dot to the left
                                                }
                                            }

                                            // Initialize status on page load
                                            updateStatus();
                                        </script>

                                    </div>

                                    <!-- Submit Button -->
                                    <div class="flex justify-end gap-4">
                                        <button type="submit" class="flex items-center justify-center gap-2 rounded-md bg-black px-6 py-2.5 text-sm font-semibold text-white transition-all duration-200 hover:bg-gray-800">
                                            <i class="ti ti-device-floppy text-lg"></i> Save
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-between mt-4">
            <div class="d-flex">
                <button class="btn btn-danger me-2">Cancel</button>
                <button class="bg-yellow-500 text-white px-6 py-3 rounded" onclick="toggleSection()">Product</button>
            </div>
            {{--            <div class="d-flex">--}}
            {{--                <a href="{{ route('pos.damage_items') }}" class="btn btn-success me-2">Damage Items</a>--}}
            {{--                <a href="{{ route('pos.stock') }}" class="btn btn-success me-2">Stock</a>--}}
            {{--                <a href="{{ route('pos.reports') }}" class="btn btn-success me-2">Reports</a>--}}
            {{--                <a href="{{ route('pos.members') }}" class="btn btn-success me-2">Members</a>--}}
            {{--                <a href="{{ route('pos.cheque_list') }}" class="btn btn-success">Cheques</a>--}}
            {{--            </div>--}}
        </div>
    </div>

    <!-- Number Pad Modal -->
    {{--    <div id="numberPadModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">--}}
    {{--        <div class="bg-white rounded-lg p-6 space-y-4 w-80">--}}
    {{--            <div class="text-center text-xl font-bold">Number Pad</div>--}}
    {{--            <div class="grid grid-cols-3 gap-4">--}}
    {{--                <button class="bg-gray-200 p-4 text-xl rounded">7</button>--}}
    {{--                <button class="bg-gray-200 p-4 text-xl rounded">8</button>--}}
    {{--                <button class="bg-gray-200 p-4 text-xl rounded">9</button>--}}
    {{--                <button class="bg-gray-200 p-4 text-xl rounded">4</button>--}}
    {{--                <button class="bg-gray-200 p-4 text-xl rounded">5</button>--}}
    {{--                <button class="bg-gray-200 p-4 text-xl rounded">6</button>--}}
    {{--                <button class="bg-gray-200 p-4 text-xl rounded">1</button>--}}
    {{--                <button class="bg-gray-200 p-4 text-xl rounded">2</button>--}}
    {{--                <button class="bg-gray-200 p-4 text-xl rounded">3</button>--}}
    {{--                <button class="bg-gray-200 p-4 text-xl rounded">0</button>--}}
    {{--                <button class="bg-gray-200 p-4 text-xl rounded">.</button>--}}
    {{--                <button class="bg-red-500 text-white p-4 text-xl rounded" onclick="closeNumberPadModal()">Close</button>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

@endsection

@push('script')

    <script src="{{asset('Hanguk_super/assets/js/jquary/jquery-3.7.1.min.js')}}"></script>
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
                success: function(response) {
                    let itemCount = billItem.length + 1;
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
                        product_name: response.product_name,
                        selling_price: sellingPrice,
                        qty: 1,
                        discount: discount,
                        subtotal: subtotal
                    });

                    // Update total amount
                    updateTotalAmount();

                    // Clear search input
                    $('#searchProduct').val("");
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
            let newTotalDiscount=0;


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
            let totalDiscount = 0;
            let returnAmount = parseFloat($('#returnAmount').text());



            billItem.forEach(item => {
                totalAmount += item.subtotal;
                totalDiscount += isNaN(item.totalDiscount) ? item.discount : item.totalDiscount;
            });



            if (hasMember ==0){
                finalTotal=totalAmount-(totalDiscount+returnAmount);
            }
            else {
                finalTotal=totalAmount-returnAmount;
            }


            $('#totalAmount').text(totalAmount.toFixed(2));
            $('#totalDiscount').text(totalDiscount.toFixed(2));
            $('.finalTotal').text(finalTotal.toFixed(2));
        }


        function calBalance(paymentType){
            if (paymentType === 'cash'){
                payType='cash';
                let cash = $('#cashAmount').val();
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
            let totalAmount = 0;
            returnItem.forEach(item => {
                totalAmount += item.subtotal;
            });
            $('.return-amount').text(totalAmount.toFixed(2));
        }
    </script>

    {{--    ===================================================================================================--}}

    <script>
        function updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('live-time').textContent = `${hours}:${minutes}:${seconds}`;
        }

        setInterval(updateTime, 1000);
        updateTime();
    </script>

    <script>
        function updateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('r-live-time').textContent = `${hours}:${minutes}:${seconds}`;
        }

        setInterval(updateTime, 1000);
        updateTime();
    </script>

@endpush



