@extends('owner.app')
@section('content')

    <div class="p-6 space-y-6">

        <div class="flex w-full items-center justify-between print:hidden">
            <h4 class="text-lg font-semibold text-default-900">Add New Admin</h4>

            <ol aria-label="Breadcrumb" class="hidden min-w-0 items-center gap-2 whitespace-nowrap md:flex">
                <li class="text-sm">
                    <a class="flex items-center gap-2 align-middle font-medium text-default-800 transition-all hover:text-primary" href="javascript:void(0)">
                        Hanguk Super
                        <i class="h-4 w-4" data-lucide="chevron-right"></i>
                    </a>
                </li>
                <li aria-current="page" class="truncate text-sm font-medium text-primary-600 hover:text-primary">
                    Add New Admin
                </li>
            </ol>
        </div>

        <div class="border border-default-200 rounded-lg">

            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="p-5 border-t border-dashed border-default-200">
                    <div class="grid lg:grid-cols-2 gap-6 mb-6">

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="name">Name</label>
                            <input id="name" name="name" value="{{ old('name') }}" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Name">
                            @error('name')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="phone">Phone</label>
                            <input id="phone" name="phone" value="{{ old('phone') }}" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="text" placeholder="Add Phone">
                            @error('phone')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="email">Email</label>
                            <input id="email" name="email" value="" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="email" placeholder="Add Email">
                            @error('email')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="password">Password</label>
                            <input id="password" name="password" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="password" placeholder="Add Password">
                            @error('password')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-default-900 mb-2" for="image">Profile Image</label>
                            <img id="imagePreview" src="" alt="Image Preview" style="display: none; width: 60px; height: 60px; margin-bottom: 10px;">
                            <input id="image" name="image" class="block w-full rounded-md py-2.5 px-4 text-default-800 text-sm focus:ring-transparent border-default-200 dark:bg-default-50" type="file" placeholder="Upload Profile Image" onchange="previewImage(event)">
                            @error('image')
                            <p class="text-red-600 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="flex justify-end gap-4">
                        <button type="submit" class="flex items-center justify-center gap-2 rounded-md bg-primary px-6 py-2.5 text-center text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:bg-primary-500">
                            <i class="ti ti-device-floppy text-lg"></i>
                            Save Admin
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
