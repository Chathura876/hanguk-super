@extends('owner.app')
@section('content')

    <div class="p-6 space-y-6">
        @if(session('success'))
            <div class="alert alert-success bg-green-500 text-white p-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-error bg-red-500 text-white p-4 rounded">
                {{ session('error') }}
            </div>
        @endif
        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Add Manager</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Add Manager
                </li>
            </ol>
        </div>

        <div class="border border-default-200 rounded-lg">
            <div class="px-6 py-4 flex items-center justify-between gap-4">
                <h4 class="grow text-lg font-medium text-default-900">Add Manager</h4>
            </div>

            <div class="p-5 border-t border-dashed border-default-200">
                {{-- Form to submit manager details --}}
                <form action="{{ route('manager.store') }}" method="POST">
                    @csrf

                    <div class="grid lg:grid-cols-2 gap-6 mb-6">

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="first_name">First Name</label>
                            <input id="first_name" name="first_name" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add First Name" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="last_name">Last Name</label>
                            <input id="last_name" name="last_name" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Last Name" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="nic_no">NIC</label>
                            <input id="nic_no" name="nic_no" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add NIC" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="email">Email</label>
                            <input id="email" name="email" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="email" placeholder="Add Email" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="phone">Phone Number</label>
                            <input id="phone" name="phone" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Phone Number" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="address">Address</label>
                            <input id="address" name="address" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Address" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="password">Password</label>
                            <input id="password" name="password" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="password" placeholder="Add Password" required>
                        </div>
                    </div>

                    <div class="flex justify-end gap-4">
                        <button type="reset" class="flex items-center justify-center gap-2 rounded-md bg-primary/10 px-6 py-2.5 text-center text-sm font-semibold text-primary shadow-sm transition-all duration-200 hover:bg-primary hover:text-white">
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
