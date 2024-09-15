@extends('supermarketpos::owner.app')
@section('content')

    <div class="p-6 space-y-6">

        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Cashiers List</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Cashiers List
                </li>
            </ol>
        </div>

        <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">
            <div class="flex flex-wrap items-center justify-between py-4 px-5">
                <div class="relative lg:flex hidden">
                    <input type="search" name="search" class="ps-12 pe-4 py-2.5 block w-64 bg-default-50/0 text-default-600 border-default-200 rounded-lg text-sm focus:border-primary focus:ring-primary" placeholder="Search...">
                    <span class="absolute start-4 top-2.5">
                        <i class="ti ti-search text-lg/none"></i>
                    </span>
                </div>

                <div class="flex flex-wrap items-center gap-2">
                    <div class="relative">
                        <select id="all-select-categories" class="hidden">
                            <option></option>
                            <option selected="">All</option>
                            <option>Cancel</option>
                        </select>

                        <div class="absolute -inset-y-0 end-3 flex items-center">
                            <i class="ti ti-selector shrink text-base/none text-default-500"></i>
                        </div>
                    </div>

                    <div class="relative">
                        <i class="ti ti-calendar text-lg text-default-700 absolute top-1/2 start-2.5 -translate-y-1/2"></i>
                        <i class="ti ti-chevron-down text-lg text-default-700 absolute top-1/2 end-2.5 -translate-y-1/2"></i>
                        <input type="text" class="py-2.5 w-40 px-9 block bg-default-100 rounded-md border-0 text-sm text-default-700 font-medium focus:border-default-200 focus:ring-0 flatpickr-input" id="datepicker-basic" readonly="readonly">
                    </div>

                    <a href="" class="relative overflow-hidden py-2.5 pe-6 ps-12 inline-flex items-center justify-center font-semibold align-middle duration-500 text-sm text-center bg-primary-600 text-white rounded-full hover:bg-primary-700">
                        <span class="absolute top-1/2 -translate-y-1/2 start-0 h-full w-10 rounded-full inline-flex items-center justify-center bg-white/20 text-white me-3"><i class="ti ti-circle-plus text-xl"></i></span>
                        Add Cashier
                    </a>
                </div>
            </div>

            <div class="border-t border-dashed border-default-200 relative overflow-x-auto">
                <table class="min-w-full">
                    <thead class="border-b border-dashed border-default-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">#</th>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">First Name</th>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">Last Name</th>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">Address</th>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">NIC</th>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">Phone</th>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">Username</th>
                        <th scope="col" class="px-6 py-3 text-center text-sm capitalize font-semibold text-default-900 min-w-32">Action</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-default-200">
                    @foreach($cashier as $cash)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" class="form-checkbox transition-all duration-100 ease-in-out border-default-200 cursor-pointer rounded text-primary bg-default-50 focus:ring-transparent focus:ring-offset-0">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">{{ $cash->first_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">{{ $cash->last_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">{{ $cash->NIC_no }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">{{ $cash->phone_no }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">{{ $cash->username }}</td>
                            <td class="whitespace-nowrap py-3 px-3 text-center text-sm font-medium">
                                <div class="flex items-center justify-center gap-2">

                                    <a href="{{ route('owner-cashier-show', $cash->id) }}" class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-default-100 border border-default-200 text-default-900 transition-all duration-200 hover:border-primary hover:bg-primary hover:text-white">
                                        <i class="ti ti-edit-circle text-base"></i>
                                    </a>
                                    <form action="{{ route('owner-cashier-delete', $cash->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this cashier?');">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-default-100 border border-default-200 text-default-900 transition-all duration-200 hover:border-primary hover:bg-primary hover:text-white">
                                            <i class="ti ti-trash text-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex items-center justify-between py-3 px-6 border-t border-dashed border-default-200">
{{--                <h6 class="text-default-600">Showing 1 to {{ $cashier->count() }} of {{ $cashier->total() }}</h6>--}}

{{--                {{ $cashier->links() }}--}}
            </div>
        </div>
    </div>

@endsection
