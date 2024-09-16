@extends('owner.app')
@section('content')
    <!-- Start Content -->
    {{--    <div class="min-h-screen flex flex-col lg:ps-64 w-full">--}}
    @if (session('success'))
        <div class="p-4 mb-4 text-sm bg-success-custom text-green-custom rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="p-6 space-y-6">

        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Add Category</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary"
                       href="javascript:void(0)">
                        GreenCart
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary"
                       href="javascript:void(0)">
                        Products
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Add Category
                </li>
            </ol>
        </div>
        <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">
{{--            <div class="px-6 py-4 flex items-center justify-between gap-4">--}}
{{--                <h5 class="grow text-lg font-medium text-default-900">Total Sales</h5>--}}
{{--                <div class="shrink hs-dropdown relative [--placement:bottom-right]">--}}
{{--                    <button type="button"--}}
{{--                            class="hs-dropdown-toggle h-8 w-8 inline-flex items-center justify-center bg-default-950/5 border border-default-200 rounded-full text-base focus:rotate-90 transition-all duration-500">--}}
{{--                        <i class="ti ti-dots-vertical"></i></button>--}}

{{--                    <div--}}
{{--                        class="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[180px] transition-[opacity,margin] mt-4 opacity-0 z-10 bg-white dark:bg-default-50 shadow-lg rounded-lg border border-default-100 p-1.5 hidden">--}}
{{--                        <ul class="flex flex-col gap-1">--}}
{{--                            <li>--}}
{{--                                <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-400/10 rounded"--}}
{{--                                   href="#">Action</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-400/10 rounded"--}}
{{--                                   href="#">Another Action</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="flex items-center font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-400/10 rounded"--}}
{{--                                   href="#">Somthing else here</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="p-5 border-t border-dashed border-default-200">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-4">
                    @csrf
                    <div class="grid lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2">
                            <div class="grid lg:grid-cols-2 gap-6 mb-6">
                                <div class="space-y-6">
                                    <div>
                                        <input
                                            name="name"
                                            class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50"
                                            type="text" placeholder="Category Name" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-3">
                            <div class="flex flex-wrap justify-end items-center gap-4">
                                <div class="flex flex-wrap items-center gap-4">
                                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                        <button type="button"
                                                class="hs-dropdown-toggle flex items-center gap-2 font-medium text-default-700 text-sm py-2.5 px-4 rounded-md bg-default-100 transition-all">
                                            Save as Draft <i data-lucide="chevron-down" class="h-4 w-4"></i>
                                        </button>

                                        <div
                                            class="hs-dropdown-menu hs-dropdown-open:opacity-100 min-w-[200px] transition-[opacity,margin] mt-4 opacity-0 hidden z-20 bg-white shadow-[rgba(17,_17,_26,_0.1)_0px_0px_16px] rounded-lg border border-default-100 p-1.5 dark:bg-default-50">
                                            <ul class="flex flex-col gap-1">
                                                <li>
                                                    <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded"
                                                       href="javascript:void(0)">Publish</a>
                                                </li>
                                                <li>
                                                    <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded"
                                                       href="javascript:void(0)">Save as Draft</a>
                                                </li>
                                                <li>
                                                    <a class="flex items-center gap-3 font-normal text-default-600 py-2 px-3 transition-all hover:text-default-700 hover:bg-default-100 rounded"
                                                       href="javascript:void(0)">Discard</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="submit"
                                            class="py-2.5 px-4 inline-flex rounded-lg text-sm font-medium bg-primary text-white transition-all hover:bg-primary-500">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    {{--    </div>--}}
@endsection
