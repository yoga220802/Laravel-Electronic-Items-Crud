@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Edit Electronic Item</h1>
            <p class="mt-2 text-sm text-gray-600">Update the details of your electronic item below</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
            <div class="p-6 sm:p-8">
                <form action="{{ route('electronic-items.update', $electronicItem) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <!-- Current Image Preview -->
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">
                            Current Image
                        </label>
                        <div class="relative rounded-lg overflow-hidden bg-gray-100 aspect-w-16 aspect-h-9">
                            @if ($electronicItem->image)
                                <img src="{{ $electronicItem->image }}" alt="{{ $electronicItem->name }}" 
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" 
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Image Upload Section -->
                    <div id="image-upload" class="flex justify-center px-6 pt-5 pb-6 border-2 border-dashed rounded-lg border-gray-300 hover:border-gray-400 transition-colors duration-200">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span>Upload new image</span>
                                    <input id="image" name="image" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            <p id="image-upload-success" class="text-xs text-green-500 hidden">Image uploaded successfully!</p>
                        </div>
                    </div>

                    <!-- Name Input -->
                    <div class="space-y-1">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Product Name
                        </label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-colors duration-200"
                            value="{{ $electronicItem->name }}"
                            placeholder="Enter product name">
                    </div>

                    <!-- Description Input -->
                    <div class="space-y-1">
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            Description
                        </label>
                        <textarea id="description" name="description" rows="4" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-colors duration-200"
                            placeholder="Enter product description">{{ $electronicItem->description }}</textarea>
                    </div>

                    <!-- Price and Stock Grid -->
                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div class="space-y-1">
                            <label for="price" class="block text-sm font-medium text-gray-700">
                                Price (Rp)
                            </label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">Rp</span>
                                </div>
                                <input type="number" name="price" id="price" required
                                    class="pl-12 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-colors duration-200"
                                    placeholder="0.00"
                                    value="{{ $electronicItem->price }}"
                                    step="0.01">
                            </div>
                        </div>

                        <div class="space-y-1">
                            <label for="stock" class="block text-sm font-medium text-gray-700">
                                Stock Quantity
                            </label>
                            <input type="number" name="stock" id="stock" required
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-colors duration-200"
                                value="{{ $electronicItem->stock }}"
                                placeholder="Enter stock quantity">
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-end space-x-4 pt-6">
                        <a href="{{ route('electronic-items.index') }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            Cancel
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                            <svg class="h-4 w-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 21h16M4 10h16M4 3h16" />
                            </svg>
                            Update Item
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('image-upload').addEventListener('drop', function(event) {
        event.preventDefault();
        const files = event.dataTransfer.files;
        if (files.length > 0) {
            document.getElementById('image').files = files;
            document.getElementById('image-upload-success').classList.remove('hidden');
        }
    });

    document.getElementById('image-upload').addEventListener('dragover', function(event) {
        event.preventDefault();
    });
</script>
@endsection

