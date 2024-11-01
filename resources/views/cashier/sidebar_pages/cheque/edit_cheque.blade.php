@extends('cashier.cashier_app')

@section('content')
    <div class="p-6 space-y-6">
        {{--        <!-- Flash Messages -->--}}
        {{--        @if (session('success'))--}}
        {{--            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">--}}
        {{--                {{ session('success') }}--}}
        {{--            </div>--}}
        {{--        @endif--}}

        {{--        @if (session('error'))--}}
        {{--            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">--}}
        {{--                {{ session('error') }}--}}
        {{--            </div>--}}
        {{--        @endif--}}

        {{--        @if ($errors->any())--}}
        {{--            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">--}}
        {{--                <ul>--}}
        {{--                    @foreach ($errors->all() as $error)--}}
        {{--                        <li>{{ $error }}</li>--}}
        {{--                    @endforeach--}}
        {{--                </ul>--}}
        {{--            </div>--}}
        {{--        @endif--}}

        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Edit Cheque</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Edit Cheque
                </li>
            </ol>
        </div>

        <!-- Form and content -->
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
                <form action="" method="POST">
                    <div class="grid lg:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="cheque_no">Cheque Number</label>
                            <input id="cheque_no" name="cheque_no" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Check Number">
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="bank_name">Bank Name</label>
                            <input id="bank_name" name="bank_name" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Bank Name">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="company_name">Company Name</label>
                            <input id="company_name" name="company_name" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Company Name">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="amount">Amount</label>
                            <input id="amount" name="amount" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Amount">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="issued_date">Issued Date</label>
                            <input id="issued_date" name="issued_date" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="date" placeholder="Add Selling Price">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="written_date">Date Written on the Cheque</label>
                            <input id="written_date" name="written_date" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="date" placeholder="Add Discount Price">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="collected_by">Collected By</label>
                            <input id="collected_by" name="collected_by" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Collected By">
                        </div>
                        <div class= "flex items-center">
                            <input class="w-9 h-5 flex items-center appearance-none bg-default-200 border-2 border-transparent rounded-full focus:ring-0 focus:ring-offset-0 cursor-pointer transition-colors ease-in-out duration-200 checked:bg-none before:content-[''] before:inline-block before:w-4 before:h-4 before:bg-white before:rounded-full before:translate-x-0 before:transform before:transition before:ease-in-out before:checked:translate-x-full before:duration-200 text-primary" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label class="ms-1.5" for="flexSwitchCheckDefault">Money Collected</label>
                        </div>
                    </div>

                    <div class="flex justify-end gap-4">
                        <button type="button" class="flex items-center justify-center gap-2 rounded-md bg-primary/10 px-6 py-2.5 text-center text-sm font-semibold text-primary shadow-sm transition-all duration-200 hover:bg-primary hover:text-white">
                            <i class="ti ti-arrow-back-up text-lg"></i>
                            Undo
                        </button>
                        <button type="submit" class="flex items-center justify-center gap-2 rounded-md bg-primary px-6 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-primary-500">
                            <i class="ti ti-device-floppy text-lg"></i>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
