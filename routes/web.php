<?php

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
    return view('layout.starter');
});

Route::get('/home', function () {
    return view('layout.inside');
});

Route::resource('vehicule', 'VehiculeController');
Route::resource('voyage', 'VoyageController');
Route::resource('destination', 'DestinationController');
Route::resource('arret', 'ArretController');
Route::post('/showVehicule', 'VehiculeController@edit')->name('editVehi');
Route::post('/showDestination', 'DestinationController@edit')->name('editDestination');
Route::delete('/destroyVehicule', 'VehiculeController@destroy')->name('destroy');
Route::put('/updateVehicule', 'VehiculeController@updateVehicule');
Route::put('/updateDestination', 'DestinationController@updateDestination');
Route::delete('/destinationDestroy', 'DestinationController@destroy')->name('destinationDestroy');

Route::get('/json-arretsDest', 'VoyageController@arretsDest');
// Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();
