<x-app-layout>

    @if (!$room)
    <?php $room = []; ?>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rooms') }}
        </h2>
    </x-slot>


    <div class="flex justify-center">
        <div class="container mx-auto max-w-screen-xl">
            <div class="flex flex-wrap -mx-4">
                @foreach($room as $rooms)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 px-4 mb-8">
                    <div class="max-w-sm rounded overflow-hidden shadow-lg">
                        <img src="{{ asset('storage/' . $rooms->file_path) }}" class="card-img-top" alt="Room Photo">
                    </div>
                    <a href="{{ route('showrequest', ['id' => $rooms->id]) }}">Check</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>