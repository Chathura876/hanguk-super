@extends('supermarketpos::owner.app')
@section('content')

    <div class="p-6 space-y-6">

        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Edit Manager</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Edit Manager
                </li>
            </ol>
        </div>
        <div class="border border-default-200 rounded-lg">
            <div class="px-6 py-4 flex items-center justify-between gap-4">
                <h4 class="grow text-lg font-medium text-default-900">Edit Manager</h4>
            </div>
            <div class="p-5 border-t border-dashed border-default-200">
                <form action="{{ route('manager.update', $manager->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid lg:grid-cols-2 gap-6 mb-6">

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="f_name">First Name</label>
                            <input id="f_name" name="first_name" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="First Name" value="{{ old('first_name', $manager->first_name) }}">
                            @error('first_name')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="l_name">Last Name</label>
                            <input id="l_name" name="last_name" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Last Name" value="{{ old('last_name', $manager->last_name) }}">
                            @error('last_name')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="nic">NIC</label>
                            <input id="nic" name="nic_no" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="NIC" value="{{ old('nic_no', $manager->nic_no) }}">
                            @error('nic_no')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="email">Email</label>
                            <input id="email" name="email" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="email" placeholder="Email" value="{{ old('email', $manager->email) }}">
                            @error('email')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="phone">Phone</label>
                            <input id="phone" name="phone" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Phone" value="{{ old('phone', $manager->phone) }}">
                            @error('phone')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="address">Address</label>
                            <input id="address" name="address" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Address" value="{{ old('address', $manager->address) }}">
                            @error('address')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="password">Password</label>
                            <input id="password" name="password" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="password" placeholder="Password" value="{{ old('password', $manager->password) }}">
                            @error('password')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="flex justify-end gap-4">
                        <a href="{{ route('manager.index') }}" class="flex items-center justify-center gap-2 rounded-md bg-primary/10 px-6 py-2.5 text-center text-sm font-semibold text-primary shadow-sm transition-all duration-200 hover:bg-primary hover:text-white">
                            <i class="ti ti-arrow-back-up text-lg"></i>
                            Undo
                        </a>
                        <button type="submit" class="flex items-center justify-center gap-2 rounded-md bg-primary px-6 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-primary-500">
                            <i class="ti ti-device-floppy text-lg"></i>
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
