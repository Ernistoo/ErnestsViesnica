<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Product</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800 flex items-center justify-center min-h-screen">
    <div class="p-6 text-gray-900">
        <a href="{{ route('rooms') }}" class="mb-4 text-blue-500 hover:underline">Back</a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create New Product</h2>

        <form action="{{ route('update', $room->id) }}" method="POST" class="w-full max-w-md">
            @csrf
            @method('PATCH')
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <textarea id="name" name="name" rows="1" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>{{ $room->name }}</textarea>
                @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                <textarea id="location" name="location" rows="1" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>{{ $room->location }}</textarea>
                @error('location')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <textarea id="price" name="price" rows="1" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>{{ $room->price }}</textarea>
                @error('price')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                <select id="category" name="category" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                    <option value="1bed" {{ $room->category === '1bed' ? 'selected' : '' }}>1 bed</option>
                    <option value="2beds" {{ $room->category === '2beds' ? 'selected' : '' }}>2 beds</option>
                    <option value="3beds" {{ $room->category === '3beds' ? 'selected' : '' }}>3 beds</option>
                    <option value="4beds" {{ $room->category === '4beds' ? 'selected' : '' }}>4 beds</option>
                </select>
                @error('category')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Upload a Photo</h2>

            <div>
                <label for="photo" class="block text-sm font-medium text-gray-700">Current Photo</label>
                <img src="{{ asset('storage/' . $room->file_path) }}" alt="Current Photo" class="mt-1 w-full h-auto">
            </div>
            <div class="mt-4">
                <label for="photo" class="block text-sm font-medium text-gray-700">New Photo</label>
                <input id="photo" class="block mt-1 w-full" type="file" name="photo" />
                <p class="text-xs text-gray-600">Upload a new photo if you want to change the current one.</p>
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