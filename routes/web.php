<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SearchController;
use \App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use \App\Http\Controllers\RoomServicesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('Home');
});
Route::resource('/rooms', RoomController::class);
Route::resource('/countries', CountryController::class);
Route::resource('/cities', CityController::class);
Route::resource('/hotels', HotelController::class);
Route::resource('/RoomServices', RoomServicesController::class);
Route::resource('/reservations', ReservationController::class);
Route::post('/search', [SearchController::class, 'search']) -> name('search');

Route::group(['middleware' => ['auth']], function (){Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');});
Route::group(['middleware' => ['auth', 'role:admin']], function (){Route::get('/dashboard/laraturst', [DashboardController::class, 'AdminPanel'])->
name('dashboard.AdminPanel');});

require __DIR__.'/auth.php';
