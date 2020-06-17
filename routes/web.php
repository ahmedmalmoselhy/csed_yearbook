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
// landing
Route::get('/', function () {
    return view('landing');
});

// signup page
Route::get('/signup', function(){
    return view('signup');
});
Route::post('/signup', 'SignupController@login');

// login page
Route::get('/login', function(){
    return view('login');
});
Route::post('/login', 'LoginController@login');

// home page
Route::get('/home', function(){
    return view('home');
});

// publish a public message
