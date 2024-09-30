@extends('owner.app')
@section('content')

    <div class="p-6 space-y-6">

        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Cheque List</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        hanguk super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Cheque List
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

                <div class="flex flex-wrap items-center gap-2">
                    <div class="relative">
                        <input type="date">
                    </div><!-- end relative -->

                    <a href="{{ route("cheque.create") }}" class="relative overflow-hidden py-2.5 pe-6 ps-12 inline-flex items-center justify-center font-semibold align-middle duration-500 text-sm text-center bg-primary-600 text-white rounded-full hover:bg-primary-700">
                        <span class="absolute top-1/2 -translate-y-1/2 start-0 h-full w-10 rounded-full inline-flex items-center justify-center bg-white/20 text-white me-3"><i class="ti ti-circle-plus text-xl"></i></span>
                        Add Cheque
                    </a>
                </div>
            </div>
            <div class="border-t border-dashed border-default-200 relative overflow-x-auto">
                <table class="min-w-full">
                    <thead class="border-b border-dashed border-default-200">
                    <tr>
                        <td class="px-6 py-3 w-10 font-medium text-default-900">
                            <input type="checkbox" class="form-checkbox transition-all duration-100 ease-in-out border-default-200 cursor-pointer rounded text-primary bg-default-50 focus:ring-transparent focus:ring-offset-0">
                        </td>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900 min-w-32">Cheque Number</th>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900 min-w-32">Bank Name</th>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900 min-w-32">Company Name</th>
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900 min-w-32">Amount</th>
{{--                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900 min-w-40">Issued Date</th>--}}
{{--                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900 min-w-40">Written Date</th>--}}
                        <th scope="col" class="px-6 py-3 text-start text-sm capitalize font-semibold text-default-900 min-w-40">Collected By</th>
                        <th scope="col" class="px-3 py-3 text-center text-sm capitalize font-semibold text-default-900 min-w-32">Status</th>
                        <th scope="col" class="px-3 py-3 text-center text-sm capitalize font-semibold text-default-900 min-w-32">Action</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-dashed divide-default-200">
                    @foreach($cheques as $cheque)
                        <tr>
                            <td class="px-6 py-3">
                                <input type="checkbox" class="form-checkbox transition-all duration-100 ease-in-out border-default-200 cursor-pointer rounded text-primary bg-default-50 focus:ring-transparent focus:ring-offset-0">
                            </td>
                            <td class="px-6 py-3 text-default-900 font-semibold whitespace-nowrap">{{ $cheque->number }}</td>
                            <td class="px-6 py-3 text-default-600 font-medium whitespace-nowrap">{{ $cheque->bank }}</td>
                            <td class="px-6 py-3 text-default-600 font-medium whitespace-nowrap">{{ $cheque->company }}</td>
                            <td class="px-6 py-3 text-default-600 font-medium whitespace-nowrap">{{ $cheque->amount }}</td>
{{--                            <td class="px-6 py-3 text-default-600 font-medium whitespace-nowrap">{{ $cheque->issued_date }}</td>--}}
{{--                            <td class="px-6 py-3 text-default-600 font-medium whitespace-nowrap">{{ $cheque->written_date }}</td>--}}
                            <td class="px-6 py-3 text-default-600 font-medium whitespace-nowrap">{{ $cheque->collect_by }}</td>
                            <td class="px-6 py-3 font-medium whitespace-nowrap text-center">
                                <input type="checkbox" class="form-checkbox rounded bg-transparent border-default-200 text-primary" {{ $cheque->status ? 'checked' : '' }}>
                            </td>
                            <td class="whitespace-nowrap py-3 px-3 text-center text-sm font-medium">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('cheque.edit', $cheque->id) }}" class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-default-100 border border-default-200 text-default-900 transition-all duration-200 hover:border-primary hover:bg-primary hover:text-white">
                                        <i class="ti ti-edit-circle text-base"></i>
                                    </a>
                                    <form style="padding-top: 10px" action="{{ route('cheque.destroy', $cheque->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-default-100 border border-default-200 text-default-900 transition-all duration-200 hover:border-primary hover:bg-primary hover:text-white">
                                            <i class="ti ti-trash text-base"></i>
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
                <h6 class="text-default-600">Showing 1 to 5 of 12</h6>

                <nav class="flex items-center gap-1">
                    <a class="inline-flex items-center justify-center h-8 w-8 border border-default-200 rounded-md text-default-950 transition-all duration-200 hover:bg-primary hover:text-white hover:border-primary" href="#">
                        <i class="ti ti-chevron-left text-base"></i>
                    </a>
                    <a class="inline-flex items-center justify-center h-8 w-8 border rounded-md transition-all duration-200 bg-primary text-white border-primary" href="#" aria-current="page">1</a>
                    <a class="inline-flex items-center justify-center h-8 w-8 border border-default-200 rounded-md text-default-950 transition-all duration-200 hover:bg-primary hover:text-white hover:border-primary" href="#">2</a>
                    <a class="inline-flex items-center justify-center h-8 w-8 border border-default-200 rounded-md text-default-950 transition-all duration-200 hover:bg-primary hover:text-white hover:border-primary" href="#">...</a>
                    <a class="inline-flex items-center justify-center h-8 w-8 border border-default-200 rounded-md text-default-950 transition-all duration-200 hover:bg-primary hover:text-white hover:border-primary" href="#">12</a>
                    <a class="inline-flex items-center justify-center h-8 w-8 border border-default-200 rounded-md text-default-950 transition-all duration-200 hover:bg-primary hover:text-white hover:border-primary" href="#">
                        <i class="ti ti-chevron-right text-base"></i>
                    </a>
                </nav>
            </div>
        </div>
    </div>
@endsection
