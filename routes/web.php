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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('users/createFromClient/{client_id}', 'UserController@createFromClient')->name('users.createFromClient');
Route::get('appointments/{id}/cancel', 'AppointmentController@cancel')->name('appointments.cancel');
Route::resource('appointments', 'AppointmentController');
Route::resource('categories', 'CategoryController');
Route::resource('clients', 'ClientController');
Route::resource('coupons', 'CouponController');
Route::resource('premiums', 'PremiumController');
Route::resource('rewards', 'RewardController');
Route::resource('services', 'ServiceController');
Route::resource('users', 'UserController');
Route::resource('wallets', 'WalletController');
