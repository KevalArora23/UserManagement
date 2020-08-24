<?php

use Illuminate\Support\Facades\Route;
use App\Mail\useremail;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', 'loginController@index')->name('login');
Route::post('/login/authenticate', 'loginController@authenticate');
Route::get('/logout', 'loginController@logout');

Route::middleware(['auth','web'])->group(function(){
    Route::get('/home', 'homeController@index')->name('home');
    Route::get('/userdata/create', 'userdataController@create');
    Route::post('/userdata', 'userdataController@store');
    Route::get('/userdata/{userid}', 'userdataController@show');
});


Auth::routes();
Route::get('/login', 'loginController@index');
Route::get('/home', 'HomeController@index')->name('home');


