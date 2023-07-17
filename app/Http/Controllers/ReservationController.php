<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        if (Auth::check())
        {
            if (Auth::user()->hasRole('user'))
            {
                $reservations = Reservation::where('user_id', Auth::id())->orderby('id')->get();
                return view('reservations.index', ['reservations' => $reservations]);
            }
            elseif (Auth::user()->hasRole('admin'))
            {
                $reservations = Reservation::all();
                return view('reservations.index', ['reservations' => $reservations]);
            }
            else
            {
                return redirect('/login');
            }
        }
        else
        {
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        if (Auth::check())
        {
            if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('user'))
            {
                return view('reservations.create', ['room' => Room::find($id)]);
            }
            else
            {
                return abort(404);
            }
        }
        else
        {
            return redirect('/login');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ReservationRequest $request)
    {

        $room = Room::find($request->input('room_id'));
        $reservation = Reservation::firstOrCreate
        ([
            'user_id' => Auth::id(),
            'Room_id' => $room->id,
            'ClientName' => $request->input('ClientName'),
            'ClientSurname' => $request->input('ClientSurname'),
            'ClientPhoneNumber' => $request->input('ClientPhoneNumber'),
            'TotalPrice' => $room->price_per_night,
            'reservation_starts' => $request->input('reservation_starts'),
            'reservation_ends' => $request->input('reservation_ends'),
            'IsCompleted' => false
        ]);
        $room->isFree = false;
        $room->save();
        return redirect(route('reservations.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        if (Auth::check())
        {
            if (Auth::user()->hasRole('admin'))
            {
                $reservation = Reservation::find($id);
                return view('reservations.edit')->with('reservation', $reservation);
            }
            else
            {
                abort(404);
            }
        }
        else
        {
            return redirect('/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $reservation = Reservation::where('id', $id)->update
        ([
            'ClientName' => $request->input('client_name'),
            'ClientSurname' => $request->input('client_surname'),
            'ClientPhoneNumber' => $request->input('client_phone_number'),
            'reservation_starts' => $request->input('reservation_start'),
            'reservation_ends' => $request->input('reservation_end'),
        ]);
        return redirect(route('reservations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        Room::find($reservation->Room_id)->isFree = true;
        return redirect(route('dashboard'));
    }
}
