<!-- resources/views/photos/show.blade.php -->

<x-app-layout>
    <div class="min-h-screen flex flex-col items-center justify-center p-6 text-gray-900 bg-gray-100 dark:bg-gray-900">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Room') }}
        </h2>

        @if ($room)
        <img class="w-96 h-auto mb-4" src="{{ asset('storage/' . $room->file_path) }}" alt="{{ $room->name }}">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">User: {{ $room->user->name }}</h1>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">{{ $room->name }}</h1>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">Location: {{ $room->location }}</h1>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">Price: {{ $room->price }}</h1>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">Category: {{ $room->category }}</h1>

        @if (Auth::check() && (Auth::id() === $room->user_id || Auth::user()->usertype === 'admin'))
        <form action="{{ route('delete', $room->id) }}" method="POST" class="mt-4">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
        </form>
        @endif

        @if (Auth::check() && (Auth::id() === $room->user_id))
        <form action="{{ route('edit', $room->id) }}" method="GET" class="mt-4">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Edit</button>
        </form>
        @endif

        @if (Auth::check() && $room->reserved_by === null)
        <form action="{{ route('reserve', $room->id) }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Reserve</button>
        </form>
        @endif

        @if (Auth::check() && $room->reserved_by === Auth::id())
        <form action="{{ route('review', $room->id) }}" method="GET" class="mt-4">
            @csrf
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Leave a review</button>
        </form>
        @endif

        <!-- Section to display reviews -->

        <!-- End of reviews section -->

        @else
        <p class="text-xl text-gray-800 dark:text-gray-200">No room found.</p>
        @endif
    </div>

</x-app-layout>