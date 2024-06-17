<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write a review</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800 flex items-center justify-center min-h-screen">
    <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Write a review</h1>


        <form class="space-y-4" action="{{ route('reviewstore', $room->id) }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Review Content</label>
                <textarea id="content" name="content" rows="1" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Write your feedback!" required>{{ old('content') }}</textarea>
                @error('content')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="stars" class="block text-sm font-medium text-gray-700">Stars</label>
                <select id="stars" name="stars" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                    <option value="1star" {{ old('stars') == '1bed' ? 'selected' : '' }}>1 star</option>
                    <option value="2stars" {{ old('stars') == '2beds' ? 'selected' : '' }}>2 star</option>
                    <option value="3stars" {{ old('stars') == '3beds' ? 'selected' : '' }}>3 star</option>
                    <option value="4stars" {{ old('stars') == '4beds' ? 'selected' : '' }}>4 star</option>
                </select>
                @error('category')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>



            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Submit Review</button>
        </form>


    </div>
</body>

</html>