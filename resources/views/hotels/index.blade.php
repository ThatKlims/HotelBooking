@extends('layouts.CoreLayout')

@section('content')
    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow">
                    <table>
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    City
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Hotel
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Hotel description
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Status
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Edit
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse($hotels as $hotel)
                                <tr class="whitespace-nowrap">
                                    @if($hotel->city->city_name != '' OR not(null))
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$hotel->city->city_name}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$hotel->hotel_name}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$hotel->hotel_description}}
                                            </div>
                                        </td>
                                    @if($hotel->isOpen == 0)
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                Closed
                                            </div>
                                        </td>
                                    @else
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                Open
                                            </div>
                                        </td>
                                    @endif
                                        <td class="px-6 py-4">
                                            <a class="px-4 py-1 text-sm text-white bg-blue-400 rounded" href="{{route('hotels.edit', ['hotel' => $hotel->id])}}">edit</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <form class="pt-3" action="{{route('hotels.destroy', ['hotel' => $hotel->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="px-4 py-1 text-sm text-white bg-blue-400 rounded" type="submit">delete</button>
                                            </form>
                                        </td>

                                </tr>
                                @else
                                    No cities have been created so there can be no hotels
                                @endif

                            @empty
                                No hotels have been created
                            @endforelse
                        </tbody>
                    </table>
                    <a class="px-4 py-1 text-sm text-white bg-blue-400 rounded m-t-10" href="{{route('dashboard')}}">return</a>
                </div>
            </div>
        </div>
    </div>
@endsection
