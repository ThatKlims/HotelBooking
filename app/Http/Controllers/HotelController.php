<?php

namespace App\Http\Controllers;

use App\Http\Requests\HotelRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
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
            if (Auth::user()->hasRole('admin'))
            {
                $hotel_data = Hotel::with("city")->orderBy('id')->get();
                return view('hotels.index', ['hotels' => $hotel_data]);
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
                return view('hotels.create');
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
    public function store(HotelRequest $request)
    {
        $hotel = Hotel::firstOrCreate
        ([
            'city_id' => $request->input('cities'),
            'hotel_name' => strtolower($request->input('hotel_name')),
            'hotel_description' => strtolower($request->input('hotel_description')),
            'isOpen' => true
        ]);
        return redirect(route('hotels.index'));
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
                $hotel = Hotel::find($id);
                return view('hotels.edit')->with('hotel', $hotel);
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
    public function update(HotelRequest $request, $id)
    {
        $hotel = Hotel::where('id', $id)->update
        ([
            'city_id' => $request->input('cities'),
            'hotel_name' => strtolower($request->input('hotel_name')),
            'hotel_description' => strtolower($request->input('hotel_description')),
            'isOpen' => $request->input('isOpen')
        ]);
        return redirect(route('hotels.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect(route('dashboard'));
    }
}
