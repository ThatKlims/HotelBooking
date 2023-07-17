<?php

namespace App\Http\Controllers;

use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check())
        {
            if (Auth::user()->hasRole('user'))
            {
                return view('UserDashboard');
            }
            elseif (Auth::user()->hasRole('admin'))
            {
                return view('dashboard');
            }
            else
            {
                return redirect('/');
            }
        }
        else
        {
            return redirect('/login');
        }
    }
    public function AdminPanel()
    {
        return redirect('/dashboard/laratrust/');
    }
//    public function CreateRoom()
//    {
//        if (Auth::user()-> hasRole('admin'))
//        {
//            return redirect(route('rooms.create'));
//        }
//        else
//        {
//            abort(404);
//        }
//    }
}
