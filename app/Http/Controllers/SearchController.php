<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if (Auth::check())
        {
            $request->validate(['country' => 'required', 'cities' => 'required']);
            if ($request->input('hotel_id') != null || $request->input('hotel_id') != '')
            {
                $rooms = Room::where([
                    ['hotel_id', $request->input('hotel_id')],
                    ['price_per_night', '<=', $request->input('price_per_night')]])->orderby('price_per_night')->get();

                return view('search-results', ['rooms' => $rooms]);
            }
            else
            {
                $city = $request->input('cities');
                if ($request->input('price_per_night') != null || $request->input('price_per_night') != '') {
                    $rooms = Room::where('price_per_night', '<=', $request->input('price_per_night'))->orderby('price_per_night')->get();
                } else {
                    $rooms = Room::all();
                }

                return view('search-results', ['rooms' => $rooms, 'city' => $city]);
            }
        }
        else
        {
            return redirect('/login');
        }

    }
}
