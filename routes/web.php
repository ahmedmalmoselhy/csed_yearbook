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

// return view('greeting', ['name' => 'James']);
// signup page
Route::get('/signup', function(){
    return view('signup');
});
// Route::get('/signup', function(){
//     return view('signup', ['error' => '']);
// });

Route::post('/signup', 'SignupController@signup');

// login page
Route::get('/login', function(){
    return view('login');
});
// Route::get('/login', function(){
//     return view('login', ['error' => '']);
// });

Route::post('/login', 'LoginController@login');

// home page
Route::get('/home', 'HomeController@showHome');
// Route::get('/home', function() {
//     return view("home", ['messages' =>
//     [
//         ["from" => "Nahla",
//         "id" => "123",
//         "is_known" => 0,
//         "message" => "Hello",
//         "message_id" => "123",
//         "time" => "15/3/2020 at 11:30:20 PM"],
//         ["from" => "Nahla",
//         "id" => "123",
//         "is_known" => 1,
//         "message" => "أزيكم",
//         "message_id" => "123",
//         "time" => "15/3/2020 at 11:30:20 PM"]
//     ],
//     "users" => [
//         "Ahmed", "Aya", "Mona", "Nahla", "Nada"
//     ]
//     ]);
// });

// publish a public message
Route::post('/home', 'MessageController@postPublicMessage');

// show profile
Route::get('/profile', 'ProfileController@showProfile');
// Route::get('/profile', function() {
//     return view("profile", [
//         "user_id" => "123",
//         "profile_id" => "1235",
//         "full_name" => "Nahla Galal",
//         "recieved_no" => 5,
//         "sent_no" => 5,
//         "messages" => [
//             ["from" => "Nahla",
//             "id" => "123",
//             "is_known" => 0,
//             "message" => "Hello",
//             "message_id" => "123",
//             "time" => "15/3/2020 at 11:30:20 PM"],
//             ["from" => "Nahla",
//             "id" => "123",
//             "is_known" => 1,
//             "message" => "أزيكم",
//             "message_id" => "123",
//             "time" => "15/3/2020 at 11:30:20 PM"]
//         ],
//     ]);
// });

// send private message
Route::post('/profile', 'MessageController@sendPrivateMessage');

// see sent messages
Route::get('/sent', 'MessageController@showSentMessages');
// Route::get('/sent', function() {
//     return view("sent", [
//         "messages" => [
//             ["to" => "Nahla Gala Mohammed",
//             "id" => "123",
//             "message" => "Hello",
//             "message_id" => "123",
//             "time" => "15/3/2020 at 11:30:20 PM"],
//             ["to" => "Nahla",
//             "id" => "123",
//             "message" => "أزيكم",
//             "message_id" => "123",
//             "time" => "15/3/2020 at 11:30:20 PM"]
//         ],
//     ]);
// });

// see received messages
Route::get('/received', 'MessageController@showMyMessages');
// Route::get('/received', function() {
//     return view("received", [
//         "messages" => [
//             ["from" => "Nahla",
//             "id" => "123",
//             "is_known" => 0,
//             "message" => "Hello",
//             "message_id" => "123",
//             "time" => "15/3/2020 at 11:30:20 PM"],
//             ["from" => "Nahla",
//             "id" => "123",
//             "is_known" => 1,
//             "message" => "أزيكم",
//             "message_id" => "123",
//             "time" => "15/3/2020 at 11:30:20 PM"]
//         ],
//     ]);
// });

// make message visible
Route::post('/received', 'MessageController@publishMessage');

// delete sent message
Route::get('/sent', 'MessageController@deleteMessage');
