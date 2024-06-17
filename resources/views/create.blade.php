<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-green-400 to-blue-500 text-gray-800 flex items-center justify-center min-h-screen">
    <div class="max-w-lg mx-auto p-8 bg-white rounded-xl shadow-lg">
        <h1 class="text-3xl font-bold mb-8 text-center text-blue-600">Add a new place</h1>
        <form class="space-y-6" action="{{ route('create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col">
                <label for="name" class="mb-2 text-lg font-medium text-gray-700">Place Name</label>
                <input type="text" id="name" name="name" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter product name" required value="{{ old('name') }}">
                @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="location" class="mb-2 text-lg font-medium text-gray-700">Location</label>
                <input type="text" id="location" name="location" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter location" required value="{{ old('location') }}">
                @error('location')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="price" class="mb-2 text-lg font-medium text-gray-700">Price</label>
                <input type="number" id="price" name="price" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter product price" required value="{{ old('price') }}">
                @error('price')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="category" class="mb-2 text-lg font-medium text-gray-700">Category</label>
                <select id="category" name="category" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="1bed" {{ old('category') == '1bed' ? 'selected' : '' }}>1 bed</option>
                    <option value="2beds" {{ old('category') == '2beds' ? 'selected' : '' }}>2 beds</option>
                    <option value="3beds" {{ old('category') == '3beds' ? 'selected' : '' }}>3 beds</option>
                    <option value="4beds" {{ old('category') == '4beds' ? 'selected' : '' }}>4 beds</option>
                </select>
                @error('category')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="photo" class="mb-2 text-lg font-medium text-gray-700">Upload Photo</label>
                <input type="file" id="photo" name="photo" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
                @error('photo')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <button type="submit" class="w-full py-3 bg-green-500 text-white font-semibold rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Create Product</button>
            </div>
        </form>
    </div>
</body>

</html>