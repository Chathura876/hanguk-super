@extends('owner.app')

@section('content')
    <div class="p-6 space-y-6">

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
            <div class="p-5 border-t border-dashed border-default-200">
                <form action="{{ route('cheque.update', $cheque->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid lg:grid-cols-2 gap-6 mb-6">
                        <!-- Cheque Number -->
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="number">Cheque Number</label>
                            <input id="number" name="number" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" value="{{ old('number', $cheque->number) }}" required>
                        </div>

                        <!-- Bank Name -->
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="bank">Bank Name</label>
                            <input id="bank" name="bank" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" value="{{ old('bank', $cheque->bank) }}" required>
                        </div>

                        <!-- Company Name -->
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="company">Company Name</label>
                            <input id="company" name="company" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" value="{{ old('company', $cheque->company) }}" required>
                        </div>

                        <!-- Amount -->
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="amount">Amount</label>
                            <input id="amount" name="amount" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="number" value="{{ old('amount', $cheque->amount) }}" required>
                        </div>

                        <!-- Issued Date -->
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="issued_date">Issued Date</label>
                            <input id="issued_date" name="issued_date" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="date" value="{{ old('issued_date', $cheque->issued_date) }}" required>
                        </div>

                        <!-- Date Written on the Cheque -->
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="written_date">Date Written on the Cheque</label>
                            <input id="written_date" name="written_date" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="date" value="{{ old('written_date', $cheque->written_date) }}" required>
                        </div>

                        <!-- Collected By -->
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="collect_by">Collected By</label>
                            <input id="collect_by" name="collect_by" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" value="{{ old('collect_by', $cheque->collect_by) }}">
                        </div>

                        <!-- Money Collected (Status) -->
                        <div class="flex items-center">
                            <input name="status" class="w-9 h-5 flex items-center appearance-none bg-default-200 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 checked:bg-none before:w-4 before:h-4 before:bg-white before:rounded-full before:translate-x-0 before:transition-transform before:ease-in-out before:checked:translate-x-full before:duration-200 text-primary" type="checkbox" role="switch" id="flexSwitchCheckDefault" {{ old('status', $cheque->status) ? 'checked' : '' }}>
                            <label class="ms-1.5" for="flexSwitchCheckDefault">Money Collected</label>
                        </div>
                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('cheque.index') }}" class="rounded-md bg-primary/10 px-6 py-2.5 text-sm font-semibold text-primary hover:bg-primary hover:text-white">Back</a>
                        <button type="submit" class="flex items-center justify-center gap-2 rounded-md bg-primary px-6 py-2.5 text-sm font-semibold text-white transition-all duration-200 hover:bg-primary-500">
                            <i class="ti ti-device-floppy text-lg"></i> Save
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
