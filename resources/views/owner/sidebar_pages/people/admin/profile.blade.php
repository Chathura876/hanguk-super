@extends('owner.app')
@section('content')

    <div class="p-6 space-y-6">

        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Personal Details</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>

                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Personal Details
                </li>
            </ol>
        </div>
        <div class="grid lg:grid-cols-2">
            <div class="lg:col-span-1">
                <div class="p-6 rounded-lg border border-default-200">
                    <img src="{{asset('Hanguk_super/assets/img/profile_images/ex_image.jpg')}}" alt="" class="w-50 mx-auto rounded-3xl p-1 border-2 border-dashed border-default-300 bg-default-100">
                    <h4 class="mb-1 mt-3 text-lg text-default-900 text-center">Namal Bandara</h4>
                    <p class="text-default-600 text-center mb-4">Admin</p>

{{--                    <div class="flex items-center justify-center gap-2 mb-3">--}}
{{--                        <button type="button" class="py-1.5 px-4 inline-flex items-center justify-center gap-2 font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-default-100 hover:bg-default-200 border-default-100 hover:border-default-200 text-default-900 rounded"><i class="ti ti-edit-circle"></i> Edit</button>--}}
{{--                        <button type="button" class="py-1.5 px-4 inline-flex items-center justify-center gap-2 font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-red-500 hover:bg-red-600 border-red-500 hover:border-red-600 text-white rounded"><i class="ti ti-trash"></i> Delete</button>--}}
{{--                    </div>--}}

                    <div class="text-start mt-6">
                        <p class="text-default-600 mb-3"><b class="text-default-700">Full Name :</b> <span class="ms-2">Namal Bandara</span></p>

                        <p class="text-default-600 mb-3"><b class="text-default-700">Nic :</b><span class="ms-2">807784177V</span></p>

                        <p class="text-default-600 mb-3"><b class="text-default-700">Email :</b> <span class="ms-2 ">namal@gmail.com</span></p>

                        <p class="text-default-600 mb-1.5"><b class="text-default-700">Username :</b> <span class="ms-2">Namal</span></p>
                    </div>
                </div>
            </div>

        </div>
{{--        <div class="flex items-center justify-center">--}}
{{--        <div class="grid lg:grid-cols-1">--}}
{{--            <div class="lg:col-span-1">--}}
{{--                <div class="p-6 rounded-lg border border-default-200">--}}
{{--                    <img src="{{asset('Hanguk_super/assets/img/profile_images/ex_image.jpg')}}" alt="" class="w-50 mx-auto rounded-3xl p-1 border-2 border-dashed border-default-300 bg-default-100">--}}
{{--                    <h4 class="mb-1 mt-3 text-lg text-default-900 text-center">Namal Bandara</h4>--}}
{{--                    <p class="text-default-600 text-center mb-4">Cashier</p>--}}

{{--                    <div class="flex items-center justify-center gap-2 mb-3">--}}
{{--                        <button type="button" class="py-1.5 px-4 inline-flex items-center justify-center gap-2 font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-default-100 hover:bg-default-200 border-default-100 hover:border-default-200 text-default-900 rounded"><i class="ti ti-edit-circle"></i> Edit</button>--}}
{{--                        <button type="button" class="py-1.5 px-4 inline-flex items-center justify-center gap-2 font-semibold tracking-wide border align-middle duration-500 text-sm text-center bg-red-500 hover:bg-red-600 border-red-500 hover:border-red-600 text-white rounded"><i class="ti ti-trash"></i> Delete</button>--}}
{{--                    </div>--}}

{{--                    <div class="text-start mt-6">--}}
{{--                        <p class="text-default-600 mb-3"><b class="text-default-700">Full Name :</b> <span class="ms-2">Namal Bandara</span></p>--}}

{{--                        <p class="text-default-600 mb-3"><b class="text-default-700">Nic :</b><span class="ms-2">807784177V</span></p>--}}

{{--                        <p class="text-default-600 mb-3"><b class="text-default-700">Email :</b> <span class="ms-2 ">namal@gmail.com</span></p>--}}

{{--                        <p class="text-default-600 mb-1.5"><b class="text-default-700">Username :</b> <span class="ms-2">Namal</span></p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--        </div>--}}
    </div>

@endsection
