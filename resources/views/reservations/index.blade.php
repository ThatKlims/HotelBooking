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
                                    Name
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Surname
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Phone Number
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    TotalPrice
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Room Number
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    reservation_starts
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    reservation_ends
                                </th>
                                <th class="px-6 py-2 text-xs text-gray-500">
                                    Reservation Status
                                </th>

                                @if(\Illuminate\Support\Facades\Auth::user()->hasrole('admin'))
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Edit
                                    </th>
                                    <th class="px-6 py-2 text-xs text-gray-500">
                                        Delete
                                    </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @forelse($reservations as $reservation)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{$reservation->ClientName}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{$reservation->ClientSurname}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{$reservation->ClientPhoneNumber}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{$reservation->TotalPrice}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{\App\Models\Room::find($reservation->Room_id)->room_number}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{$reservation->reservation_starts}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{$reservation->reservation_ends}}
                                        </div>
                                    </td>
                                    @if($reservation->IsCompleted == 0)
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                Ongoing
                                            </div>
                                        </td>
                                    @else
                                        <td class="px-6 py-4">
                                            <div class="text-sm text-gray-900">
                                                Completed
                                            </div>
                                        </td>
                                    @endif
                                    @if(\Illuminate\Support\Facades\Auth::user()->hasrole('admin'))
                                        <td class="px-6 py-4">
                                            <a class="px-4 py-1 text-sm text-white bg-blue-400 rounded" href="{{route('reservations.edit', ['reservation' => $reservation->id])}}">edit</a>
                                        </td>
                                        <td class="px-6 py-4">
                                            <form class="pt-3" action="{{route('reservations.destroy', ['reservation' => $reservation->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="px-4 py-1 text-sm text-white bg-blue-400 rounded" type="submit">delete</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                                @empty
                                    No reservation have been made
                                @endforelse
                            </tbody>
                        </table>
                    <a class="px-4 py-1 text-sm text-white bg-blue-400 rounded m-t-10" href="{{route('dashboard')}}">return</a>
                </div>
            </div>
        </div>
    </div>
@endsection
