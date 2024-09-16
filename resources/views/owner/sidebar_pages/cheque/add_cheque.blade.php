@extends('owner.app')

@section('content')
    <div class="p-6 space-y-6">

        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Add Cheque</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Add Cheque
                </li>
            </ol>
        </div>

        <!-- Form and content -->
        <div class="border border-default-200 rounded-lg">
            <div class="p-5 border-t border-dashed border-default-200">
                <form action="{{ route('cheque.store') }}" method="POST">
                    @csrf <!-- CSRF token for form security -->
                    <div class="grid lg:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="number">Cheque Number</label>
                            <input id="number" name="number" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Cheque Number" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="bank">Bank Name</label>
                            <input id="bank" name="bank" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Bank Name" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="company">Company Name</label>
                            <input id="company" name="company" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Company Name" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="amount">Amount</label>
                            <input id="amount" name="amount" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="number" placeholder="Add Amount" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="issued_date">Issued Date</label>
                            <input id="issued_date" name="issued_date" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="date" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="written_date">Date Written on the Cheque</label>
                            <input id="written_date" name="written_date" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="date" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="collect_by">Collected By</label>
                            <input id="collect_by" name="collect_by" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Collected By">
                        </div>

                        <div class="flex items-center">
                            <input name="status" class="w-9 h-5 flex items-center appearance-none bg-default-200 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 checked:bg-none before:w-4 before:h-4 before:bg-white before:rounded-full before:translate-x-0 before:transition-transform before:ease-in-out before:checked:translate-x-full before:duration-200 text-primary" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                            <label class="ms-1.5" for="flexSwitchCheckDefault">Money Collected</label>
                        </div>
                    </div>

                    <div class="flex justify-end gap-4">
                        <button type="button" class="flex items-center justify-center gap-2 rounded-md bg-primary/10 px-6 py-2.5 text-sm font-semibold text-primary transition-all duration-200 hover:bg-primary hover:text-white">
                            <i class="ti ti-arrow-back-up text-lg"></i> Undo
                        </button>
                        <button type="submit" class="flex items-center justify-center gap-2 rounded-md bg-primary px-6 py-2.5 text-sm font-semibold text-white transition-all duration-200 hover:bg-primary-500">
                            <i class="ti ti-device-floppy text-lg"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
