@extends('layouts.CoreLayout')

@section('content')
    <div class="container flex justify-center mx-auto">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="border-b border-gray-200 shadow">
                    <table>
                        <thead class="bg-gray-50">
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Country
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                City
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Postal Code
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Delete
                            </th>
                        </thead>
                        <tbody class="bg-white">
                            @forelse($cities as $city)
                                <tr class="whitespace-nowrap">
                                    @if($city->country->country_name != '' OR null)
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{$city->country->country_name}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{$city->city_name}}
                                        </div>
                                    </td>
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                {{$city->postal_code}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <form class="pt-3" action="{{route('cities.destroy', ['city' => $city->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="px-4 py-1 text-sm text-white bg-blue-400 rounded" type="submit">delete</button>
                                            </form>
                                        </td>
                                    @else
                                        No countries have been created so there can be no cities
                                    @endif
                                @empty
                                    No cities have been created
                                @endforelse
                                </tr>
                        </tbody>
                    </table>
                    <a class="px-4 py-1 text-sm text-white bg-blue-400 rounded m-t-10" href="{{route('dashboard')}}">return</a>
                </div>
            </div>
        </div>
    </div>
@endsection


