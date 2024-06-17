<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800 flex items-center justify-center min-h-screen">
    <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Create New Product</h1>
        <form class="space-y-4" action="{{ route('create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <textarea id="name" name="name" rows="1" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Product name" required>{{ old('name') }}</textarea>
                @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <textarea id="location" name="location" rows="1" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Location" required>{{ old('location') }}</textarea>
                @error('location')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <textarea id="price" name="price" rows="1" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Product price" required>{{ old('price') }}</textarea>
                @error('price')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category" name="category" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                    <option value="1bed" {{ old('category') == '1bed' ? 'selected' : '' }}>1 bed</option>
                    <option value="2beds" {{ old('category') == '2beds' ? 'selected' : '' }}>2 beds</option>
                    <option value="3beds" {{ old('category') == '3beds' ? 'selected' : '' }}>3 beds</option>
                    <option value="4beds" {{ old('category') == '4beds' ? 'selected' : '' }}>4 beds</option>
                </select>
                @error('category')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Upload a Photo') }}</h2>

            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                <input id="photo" class="block mt-1 w-full" type="file" name="photo" required />
                @error('photo')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit" class="w-full py-2 px-4 bg-blue-500 text-white font-semibold rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Submit</button>
            </div>
        </form>

    </div>
</body>

</html>