@extends('owner.app')
@section('content')

    <style>
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background-color: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #cccccc; /* Gray scrollbar */
        }
    </style>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4 bg-success-custom">
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
            <h4 class="text-lg font-semibold text-default-900">Add Brand</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        hanguk super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Brands
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Add Brand
                </li>
            </ol>
        </div>

        <div class="border border-default-200 rounded-lg bg-white dark:bg-default-50 h-fit">
            <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-4">
                @csrf
                <div class="grid lg:grid-cols-3 gap-6">
                    <div>
                        <div class="brand-dropzone dropzone h-60 mb-6">
                            <input name="img" type="file" class="hidden" id="brandImage">
                            <label for="brandImage" class="dz-message needsclick w-full h-full flex flex-col items-center justify-center cursor-pointer">
                                <div class="mb-3">
                                    <i class="ti ti-photo-circle text-4xl text-primary"></i>
                                </div>
                                <h5 class="text-xl text-default-600">
                                    <i class="ti ti-cloud-upload text-lg text-default-600"></i> Upload Brand Logo.
                                </h5>
                                <p class="text-sm text-default-600 mb-2">Upload a logo for your brand (optional).</p>
                            </label>
                            @error('IMG')
                            <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="lg:col-span-2">
                        <div class="grid lg:grid-cols-2 gap-6 mb-6">
                            <div class="space-y-6">
                                <input name="name" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Brand Name" value="{{ old('name') }}">
                                @error('name')
                                <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                                @enderror

                                <input name="company" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Company Name" value="{{ old('company') }}">
                                @error('company')
                                <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-3">
                        <div class="flex flex-wrap justify-end items-center gap-4">
                            <button type="submit" class="py-2.5 px-4 inline-flex rounded-lg text-sm font-medium bg-primary text-white transition-all hover:bg-primary-500">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
