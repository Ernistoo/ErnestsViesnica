<!-- resources/views/photos/show.blade.php -->

<x-app-layout>
    <div class="p-6 text-gray-900">
        <a href=" {{route('rooms')}} ">Back</a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Room') }}
        </h2>
        @if ($room)
        <img class="w-96 h-auto" src="{{ asset('storage/' . $room->file_path) }}" alt="{{ $room->name }}">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">{{ $room->name }}</h1>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">Location: {{ $room->location }}</h1>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">Price: {{ $room->price }}</h1>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">Category: {{ $room->category }}</h1>

        <form action="{{ route('delete', $room->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" style="background-color: #dc3545;">Delete</button>
        </form>
        <form action="{{ route('accept', $room->id) }}" method="POST">
            @csrf

            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" style="background-color: #dc3545;">ACCEPT</button>
        </form>

        @else
        <p>No room found.</p>
        @endif
    </div>
</x-app-layout>