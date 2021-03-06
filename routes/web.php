<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('vehicles.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/vehicles', 'VehicleController@index')->name('vehicles.index');
Route::get('/vehicles/add', 'VehicleController@addVehicle')->name('vehicles.add');
Route::post('/vehicles/store', 'VehicleController@store')->name('vehicles.store');
Route::post('/vehicles/update', 'VehicleController@update')->name('vehicles.update');
Route::get('/vehicles/check-status', 'VehicleController@checkStatus')->name('vehicles.check_status');
Route::post('/vehicles/{id}/status-park', 'VehicleController@statusPark')->name('vehicles.status-park');
Route::post('/vehicles/{id}/status-out', 'VehicleController@statusOut')->name('vehicles.status-out');