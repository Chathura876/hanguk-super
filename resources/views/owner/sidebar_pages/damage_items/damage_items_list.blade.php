@extends('owner.app')
@section('content')

    <div class="p-6 space-y-6">
        {{-- Success message --}}
        @if (session('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg" role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Page title and add new button --}}
        <div class="flex w-full items-center justify-between">
            <h4 class="text-lg font-semibold text-default-900">Damage Items</h4>
            <a href="{{ route('damage_items.create') }}" class="rounded-md bg-primary px-6 py-2.5 text-sm font-semibold text-white transition-all duration-200 hover:bg-primary-500 flex items-center">
                <i class="ti ti-plus text-lg mr-2"></i> Add New
            </a>
        </div>

        {{-- Table --}}
        <div class="border border-default-200 rounded-lg">
            <div class="p-5 border-t border-dashed border-default-200">
                <table class="w-full border-collapse">
                    <thead>
                    <tr>
                        <th class="border-b p-3 text-left">Product Name</th>
                        <th class="border-b p-3 text-left">Date</th>
                        <th class="border-b p-3 text-left">Quantity</th>
                        <th class="border-b p-3 text-left">Added By</th>
                        <th class="border-b p-3 text-left">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($damageItems as $item)
                        <tr>
                            <td class="border-b p-3">{{ $item->product_name }}</td>
                            <td class="border-b p-3">{{ $item->date }}</td>
                            <td class="border-b p-3">{{ $item->quantity }}</td>
                            <td class="border-b p-3">{{ $item->added_by }}</td>
                            <td class="whitespace-nowrap py-3 px-3 text-center text-sm font-medium">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('damage_items.edit', $item->id) }}"
                                       class="inline-flex items-center justify-center h-9 w-9 rounded-full bg-default-100 border border-default-200 text-default-900 transition-all duration-200 hover:border-primary hover:bg-primary hover:text-white">
                                        <i class="ti ti-edit-circle text-base"></i>
                                    </a>
                                    <form action="{{ route('damage_items.delete', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
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
        </div>
    </div>

@endsection
