@extends('owner.app')

@section('content')

    <div class="p-6 space-y-6">
        <div class="flex w-full items-center justify-between">
            <h4 class="text-lg font-semibold text-default-900">Product Types</h4>
            <a href="{{ route('product.type') }}" class="rounded-md bg-primary px-6 py-2.5 text-sm font-semibold text-white transition-all duration-200 hover:bg-primary-500">
                Add New
            </a>
        </div>

        <div class="border border-default-200 rounded-lg">
            <div class="p-5 border-t border-dashed border-default-200">
                <table class="w-full border-collapse">
                    <thead>
                    <tr>
                        <th class="border-b p-3 text-left">Type</th>
                        <th class="border-b p-3 text-left">Description</th>
                        <th class="border-b p-3 text-left">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($productTypes as $productType)
                        <tr>
                            <td class="border-b p-3">{{ $productType->type }}</td>
                            <td class="border-b p-3">{{ $productType->description }}</td>
                            <td class="border-b p-3">
{{--                                <a href="{{ route('product-types.edit', $productType) }}" class="text-primary">Edit</a>--}}
                                <form action="{{ route('product-type.delete', $productType) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
