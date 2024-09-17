@extends('owner.app')

@section('content')
    <div class="p-6 space-y-6">
        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Admin List</h4>
            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>
                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Admin List
                </li>
            </ol>
        </div>

        <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">
            <div class="flex flex-wrap items-center justify-between py-4 px-5">
                <div class="relative lg:flex hidden">
                    <input type="search" class="ps-12 pe-4 py-2.5 block w-64 bg-default-50/0 text-default-600 border-default-200 rounded-lg text-sm focus:border-primary focus:ring-primary" placeholder="Search...">
                    <span class="absolute start-4 top-2.5">
                    <i class="ti ti-search text-lg/none"></i>
                </span>
                </div>

            </div>

            <div class="border-t border-dashed border-default-200 relative overflow-x-auto">
                <table class="min-w-full">
                    <thead class="border-b border-dashed border-default-200">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-start min-w-4">
                            <input type="checkbox" class="form-checkbox transition-all duration-100 ease-in-out border-default-200 cursor-pointer rounded text-primary bg-default-50 focus:ring-transparent focus:ring-offset-0">
                        </th>
{{--                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">Image</th>--}}
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">Name</th>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">Phone</th>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900">Email</th>
                        <th scope="col" class="px-6 py-3 text-center text-sm capitalize font-semibold text-default-900 min-w-32">Action</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-default-200">
                    @foreach($admins as $admin)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" class="form-checkbox transition-all duration-100 ease-in-out border-default-200 cursor-pointer rounded text-primary bg-default-50 focus:ring-transparent focus:ring-offset-0">
                            </td>
{{--                            <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">--}}
{{--                                <!-- Assuming image is a URL; otherwise, adjust accordingly -->--}}
{{--                                <img src="{{ $admin->image }}" alt="Admin Image" class="w-12 h-12 rounded-full object-cover">--}}
{{--                            </td>--}}
                            <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">{{ $admin->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">{{ $admin->phone }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-base text-default-800">{{ $admin->email }}</td>
                            <td class="whitespace-nowrap py-3 px-3 text-center text-sm font-medium">
                                <div class="flex items-center justify-center gap-2">
{{--                                    <a href="{{ route('admin.show', $admin->id) }}" class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-default-100 border border-default-200 text-default-900 transition-all duration-200 hover:border-primary hover:bg-primary hover:text-white">--}}
{{--                                        <i class="ti ti-eye text-lg"></i>--}}
{{--                                    </a>--}}
                                    <a href="{{ route('admin.edit', $admin->id) }}" class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-default-100 border border-default-200 text-default-900 transition-all duration-200 hover:border-primary hover:bg-primary hover:text-white">
                                        <i class="ti ti-edit-circle text-base"></i>
                                    </a>
                                    <form style="padding-top: 10px" action="{{ route('admin.delete', $admin->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this admin?');">
                                        @csrf
                                        @method('DELETE')
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

{{--            <div class="flex items-center justify-between py-3 px-6 border-t border-dashed border-default-200">--}}
{{--                <h6 class="text-default-600">Showing 1 to {{ $admins->count() }} of {{ $admins->total() }}</h6>--}}
{{--                {{ $admins->links() }} <!-- Pagination links -->--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
