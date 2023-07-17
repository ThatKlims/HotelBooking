<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\RoomServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
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
            $data = Room::all();
            return view('rooms.index', ['rooms' => $data]);
        }
        else
        {
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        if (Auth::check())
        {
            if (Auth::user()->hasRole('admin'))
            {
                return view('rooms.create');
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
    public function store(RoomRequest $request)
    {
        $request->validate(['RoomServices' => 'required']);
        $room = Room::firstOrCreate
        ([
            'hotel_id' => $request->input('hotels'),
            'room_number' => $request->input('room_number'),
            'room_description' => $request->input('room_description'),
            'price_per_night' => $request->input('price_per_night'),
            'isFree' => true
        ]);

        $RoomServices = RoomServices::find($request->input('RoomServices'));
        $room->RoomServices()->attach($RoomServices);


        return redirect(route('rooms.index'));
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
                $room = Room::find($id);
                return view('rooms.edit')->with('room', $room);
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
    public function update(RoomRequest $request, $id)
    {
        $room = Room::where('id', $id)->update
        ([
            'hotel_id' => $request->input('hotels'),
            'room_number' => $request->input('room_number'),
            'room_description' => $request->input('room_description'),
            'price_per_night' => $request->input('price_per_night'),
            'isFree' =>  $request->input('isFree')
        ]);
        return redirect(route('rooms.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Room $room, RoomServices $RoomServices)
    {
        $room->RoomServices()->detach($RoomServices);
        $room->delete();
        return redirect(route('dashboard'));
    }

}
