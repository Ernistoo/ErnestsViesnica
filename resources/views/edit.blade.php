<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-gray-800 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('rooms') }}" class="text-blue-500 hover:underline">Back</a>
            <h2 class="text-2xl font-bold text-gray-800">Edit Product</h2>
        </div>

        <form action="{{ route('update', $room->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PATCH')
            <div class="flex flex-col">
                <label for="name" class="mb-1 text-lg font-medium text-gray-700">Name</label>
                <input type="text" id="name" name="name" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $room->name }}" required>
                @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="location" class="mb-1 text-lg font-medium text-gray-700">Location</label>
                <input type="text" id="location" name="location" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $room->location }}" required>
                @error('location')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="price" class="mb-1 text-lg font-medium text-gray-700">Price</label>
                <input type="number" id="price" name="price" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $room->price }}" required>
                @error('price')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="category" class="mb-1 text-lg font-medium text-gray-700">Category</label>
                <select id="category" name="category" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="1bed" {{ $room->category === '1bed' ? 'selected' : '' }}>1 bed</option>
                    <option value="2beds" {{ $room->category === '2beds' ? 'selected' : '' }}>2 beds</option>
                    <option value="3beds" {{ $room->category === '3beds' ? 'selected' : '' }}>3 beds</option>
                    <option value="4beds" {{ $room->category === '4beds' ? 'selected' : '' }}>4 beds</option>
                </select>
                @error('category')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col">
                <label for="photo" class="mb-1 text-lg font-medium text-gray-700">Current Photo</label>
                <img src="{{ asset('storage/' . $room->file_path) }}" alt="Current Photo" class="rounded-md shadow-sm mb-4">
                <label for="photo" class="mb-1 text-lg font-medium text-gray-700">New Photo</label>
                <input type="file" id="photo" name="photo" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-xs text-gray-600 mt-1">Upload a new photo if you want to change the current one.</p>
                @error('photo')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <button type="submit" class="w-full py-3 bg-green-500 text-white font-semibold rounded-md shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Update Product</button>
            </div>
        </form>
    </div>
</body>

</html>