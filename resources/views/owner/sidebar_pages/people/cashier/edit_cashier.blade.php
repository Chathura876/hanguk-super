@extends('owner.app')
@section('content')

    <div class="p-6 space-y-6">
        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Edit Cashier</h4>
            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>
                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Edit Cashier
                </li>
            </ol>
        </div>
        <div class="border border-default-200 rounded-lg">
            <form action="{{ route('owner-cashier-update', $cashier->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-5 border-t border-dashed border-default-200">
                    <div class="grid lg:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="f_name">First Name</label>
                            <input id="f_name" name="first_name" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" value="{{ old('first_name', $cashier->first_name) }}" placeholder="Add First Name">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="l_name">Last Name</label>
                            <input id="l_name" name="last_name" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" value="{{ old('last_name', $cashier->last_name) }}" placeholder="Add Last Name">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="nic">NIC</label>
                            <input id="nic" name="NIC_no" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" value="{{ old('NIC_no', $cashier->NIC_no) }}" placeholder="Add NIC">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="phone_no">Phone Number</label>
                            <input id="phone_no" name="phone_no" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" value="{{ old('phone_no', $cashier->phone_no) }}" placeholder="Add Phone Number">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="whatsapp_no">WhatsApp Number</label>
                            <input id="whatsapp_no" name="whatsapp_no" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" value="{{ old('whatsapp_no', $cashier->whatsapp_no) }}" placeholder="Add WhatsApp Number">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="email">address</label>
                            <input id="address" name="address" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" value="{{ old('address', $cashier->address) }}" placeholder="Add address">
                        </div>

{{--                        <div>--}}
{{--                            <label class="block text-sm font-medium text-default-900 mb-2" for="img">Profile Image</label>--}}
{{--                            <img id="imagePreview" src="{{ $cashier->img }}" alt="Image Preview" style="display: block; width: 60px; height: 60px; margin-bottom: 10px;">--}}
{{--                            <input id="img" name="img" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="file" onchange="previewImage(event)">--}}
{{--                        </div>--}}

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="user_name">Username</label>
                            <input id="user_name" name="username" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" value="{{ old('username', $cashier->username) }}" placeholder="Add Username">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="password">Password</label>
                            <input id="password" name="password" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="password" value="{{ old('password', $cashier->password) }}" placeholder="Add Password">
                        </div>
                    </div>

                    <div class="flex justify-end gap-4">
{{--                        <button type="reset" class="flex items-center justify-center gap-2 rounded-md bg-primary/10 px-6 py-2.5 text-center text-sm font-semibold text-primary shadow-sm transition-all duration-200 hover:bg-primary hover:text-white">--}}
{{--                            <i class="ti ti-arrow-back-up text-lg"></i>--}}
{{--                            Undo--}}
{{--                        </button>--}}
                        <button type="submit" class="flex items-center justify-center gap-2 rounded-md bg-primary px-6 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-primary-500">
                            <i class="ti ti-device-floppy text-lg"></i>
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const input = event.target;
            const imagePreview = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                }

                reader.readAsDataURL(input.files[0]);
            } else {
                imagePreview.style.display = 'none';
            }
        }
    </script>

@endsection
