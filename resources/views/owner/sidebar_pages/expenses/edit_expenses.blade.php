@extends('owner.app')

@section('content')
    <div class="p-6 space-y-6">

        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Edit Expenses</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Edit Expenses
                </li>
            </ol>
        </div>

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

            <form action="{{ route('owner.update_expenses', ['id' => $expense->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="p-5 border-t border-dashed border-default-200">
                    <div class="grid lg:grid-cols-2 gap-6 mb-6">

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="date">Date</label>
                            <input id="date" name="date" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="date" value="{{ old('date', $expense->date) }}" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="details">Expense Details</label>
                            <input id="details" name="details" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Description" value="{{ old('details', $expense->details) }}" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="type">Expense Type</label>
                            <input id="type" name="type" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Type" value="{{ old('type', $expense->type) }}" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="addBy">Added By</label>
                            <div class="relative">
                                <select id="addBy" name="addBy" data-hs-select='{
                                    "placeholder": "Select Person",
                                    "toggleTag": "<button type=\"button\"></button>",
                                    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 block w-full rounded py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border text-start border-default-200 dark:bg-default-50 focus:border-primary",
                                    "dropdownClasses": "mt-2 z-50 w-full max-h-[300px] p-1 space-y-0.5 bg-white border border-default-200 rounded-md overflow-hidden overflow-y-auto dark:bg-default-50",
                                    "optionClasses": "py-2 px-4 w-full text-sm text-default-800 cursor-pointer hover:bg-default-100 rounded focus:outline-none focus:bg-default-100",
                                    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><i class=\"ti ti-checks shrink text-lg/none text-primary\" /></i></span></div>"
                                    }' class="hidden">
                                    <option value="Namal" {{ $expense->addBy === 'Namal' ? 'selected' : '' }}>Namal (Cashier)</option>
                                </select>
                                <div class="absolute top-1/2 end-3 -translate-y-1/2">
                                    <i class="ti ti-arrows-move-vertical shrink text-sm text-default-600"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="amount">Amount</label>
                            <input id="amount" name="amount" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Expenses Amount" value="{{ old('amount', $expense->amount) }}" required>
                        </div>

                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('owner.expenses_list') }}" class="flex items-center justify-center gap-2 rounded-md bg-primary/10 px-6 py-2.5 text-center text-sm font-semibold text-primary shadow-sm transition-all duration-200 hover:bg-primary hover:text-white">
                            <i class="ti ti-arrow-back-up text-lg"></i>
                            Undo
                        </a>
                        <button type="submit" class="flex items-center justify-center gap-2 rounded-md bg-primary px-6 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-primary-500">
                            <i class="ti ti-device-floppy text-lg"></i>
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
