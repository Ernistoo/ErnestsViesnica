<x-app-layout>

    @if (!$room)
    <?php $room = []; ?>
    @endif

    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
            {{ __('Rooms') }}
        </h2>
    </x-slot>



    <div class="flex justify-center">
        <div class="container mx-auto max-w-screen-xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6">
                @foreach($room as $rooms)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition duration-300">
                    <img src="{{ asset('storage/' . $rooms->file_path) }}" class="w-full h-48 object-cover" alt="Room Photo">
                    <div class="p-4">
                        <a href="{{ route('show', ['id' => $rooms->id]) }}" class="text-blue-500 hover:underline font-semibold">View Details</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>