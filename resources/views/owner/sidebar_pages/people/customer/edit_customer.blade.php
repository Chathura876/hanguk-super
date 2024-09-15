@extends('supermarketpos::owner.app')
@section('content')

    <div class="p-6 space-y-6">
        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Edit Customer Membership</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Edit Customer Membership
                </li>
            </ol>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form to update an existing customer --}}
        <form action="{{ route('customer.update', $customer->id) }}" method="POST">
            @csrf
            <div class="border border-default-200 rounded-lg">
                <div class="p-5 border-t border-dashed border-default-200">
                    <div class="grid lg:grid-cols-2 gap-6 mb-6">
                        {{-- First Name --}}
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="first_name">First Name</label>
                            <input id="first_name" name="first_name" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" value="{{ old('first_name', $customer->first_name) }}" placeholder="Add First Name" required>
                        </div>

                        {{-- Last Name --}}
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="last_name">Last Name</label>
                            <input id="last_name" name="last_name" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" value="{{ old('last_name', $customer->last_name) }}" placeholder="Add Last Name" required>
                        </div>

                        {{-- NIC Number --}}
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="nic">NIC Number</label>
                            <input id="nic" name="nic" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" value="{{ old('nic', $customer->nic) }}" placeholder="Add NIC Number" required>
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="email">Email</label>
                            <input id="email" name="email" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="email" value="{{ old('email', $customer->email) }}" placeholder="Add Email" required>
                        </div>

                        {{-- Birthday --}}
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="b_day">Birthday</label>
                            <input id="b_day" name="b_day" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="date" value="{{ old('b_day', $customer->b_day) }}" required>
                        </div>

                        {{-- Phone Number --}}
{{--                        <div>--}}
{{--                            <label class="block text-sm font-medium text-default-900 mb-2" for="phone_number">Phone Number</label>--}}
{{--                            <input id="phone_number" name="phone_number" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="tel" value="{{ old('phone_number', $customer->phone_number) }}" placeholder="Add Phone Number" required>--}}
{{--                        </div>--}}

                        {{-- Username --}}
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="user_name">Username</label>
                            <input id="user_name" name="user_name" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" value="{{ old('user_name', $customer->user_name) }}" placeholder="Add Username">
                        </div>

                        {{-- Shop ID --}}
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="shop_id">Shop ID</label>
                            <input id="shop_id" name="shop_id" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="number" value="{{ old('shop_id', $customer->shop_id) }}" placeholder="Add Shop ID">
                        </div>

                        {{-- Card Number --}}
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="card_no">Card Number</label>
                            <input id="card_no" name="card_no" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" value="{{ old('card_no', $customer->card_no) }}" placeholder="Add Card Number">
                        </div>

                        {{-- Membership Type --}}
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="type">Membership Type</label>
                            <select id="type" name="type" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50">
                                <option value="regular" {{ old('type', $customer->type) == 'regular' ? 'selected' : '' }}>Regular</option>
                                <option value="vip" {{ old('type', $customer->type) == 'vip' ? 'selected' : '' }}>VIP</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end gap-4">
                        <button type="submit" class="flex items-center justify-center gap-2 rounded-md bg-primary px-6 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-primary-500">
                            <i class="ti ti-device-floppy text-lg"></i>
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
