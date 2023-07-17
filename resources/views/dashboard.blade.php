<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as admin!
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('countries.create')}}" class="text-green-600">Add a country</a>
                    <br>
                    <a href="{{route('countries.index')}}" class="text-indigo-600">see all countries</a>
                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('cities.create')}}" class="text-green-600">Add a city</a>
                    <br>
                    <a href="{{route('cities.index')}}" class="text-indigo-600">see all cities</a>
                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('hotels.create')}}" class="text-green-600">Add a hotel</a>
                    <br>
                    <a href="{{route('hotels.index')}}" class="text-indigo-600">see all hotels</a>
                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('rooms.create')}}" class="text-green-600">Add a room</a>
                    <br>
                    <a href="{{route('rooms.index')}}" class="text-indigo-600">see all rooms</a>
                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('RoomServices.create')}}" class="text-green-600">Add a RoomService</a>
                    <br>
                    <a href="{{route('RoomServices.index')}}" class="text-indigo-600">see all RoomServices</a>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{route('reservations.index')}}" class="text-indigo-600">see all Reservations</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
