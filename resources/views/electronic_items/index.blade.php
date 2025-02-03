@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Electronic Items</h1>
        <a href="{{ route('electronic-items.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add New Item
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($items as $item)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if ($item->image)
                    <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No Image</span>
                    </div>
                @endif
                <div class="p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $item->name }}</h2>
                    <p class="text-gray-600 mb-2">{{ Str::limit($item->description, 100) }}</p>
                    <p class="text-gray-800 font-bold mb-2">${{ number_format($item->price, 2) }}</p>
                    <p class="text-gray-600 mb-4">Stock: {{ $item->stock }}</p>
                    <div class="flex justify-between">
                        <a href="{{ route('electronic-items.edit', $item) }}"
                            class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </a>
                        <form action="{{ route('electronic-items.destroy', $item) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
