@extends('owner.app')

@section('content')
    <div class="p-6 space-y-6">
        @if (session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-100 rounded-lg" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 mb-4 text-red-800 bg-red-100 rounded-lg" role="alert">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="p-4 mb-4 text-red-800 bg-red-100 rounded-lg" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Add Expenses</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Add Expenses
                </li>
            </ol>
        </div>
        <div class="border border-default-200 rounded-lg">
            <div class="p-5 border-t border-dashed border-default-200">
                <form action="{{ route('expenses.store') }}" method="POST">
                    @csrf
                    <div class="grid lg:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="date">Date</label>
                            <input id="date" name="date" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="date">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="details">Expense Details</label>
                            <input id="details" name="details" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Description">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="type">Expense Type</label>
                            <input id="type" name="type" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Type">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="addBy">Added By</label>
                            <div class="relative">
                                <select id="addBy" name="addBy" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50">
                                    <option value="">Select Person</option>
                                    <option value="Namal">Namal (Cashier)</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="amount">Amount</label>
                            <input id="amount" name="amount" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Expenses Amount">
                        </div>

                    </div>

                    <div class="flex justify-end gap-4">
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
