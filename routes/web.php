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
    return view('master');
});

Route::get('/special', 'SpecialOfferController@index');
Route::get('/special/{id}', 'SpecialOfferController@show');

Route::get('/recipient', 'RecipientController@index');

Route::post('/special/{id}/voucher', 'VoucherController@create');



