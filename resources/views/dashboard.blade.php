<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class=" py-12">
        <div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Welcome to [Your Website Name] - your ultimate destination for unforgettable stays!

Discover unique accommodations and experiences tailored to your preferences. Whether you're planning a weekend getaway, a family vacation, or a business trip, we've got you covered with a wide range of options to suit every taste and budget.

Browse through our curated selection of cozy apartments, chic lofts, luxurious villas, and charming cottages located in the most desirable neighborhoods. Each listing is carefully vetted to ensure comfort, safety, and convenience.

But it's not just about the place; it's about the experience. Immerse yourself in local culture, savor authentic cuisine, and embark on thrilling adventures with our handpicked collection of activities and excursions.

Booking with us is easy and secure. Our responsive customer support team is available around the clock to assist you every step of the way, ensuring a hassle-free and enjoyable experience from start to finish.

Start planning your next getaway today and create memories that will last a lifetime with [Your Website Name].") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>