<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class LoginController extends Controller
{
    public function login(Request $request){
        $username = $request['username'];
        $password = $request['password'];
        if($username != null && $password != null){
            $user = User::where(['username' => $username,
                'password' => $password])
                ->first();
            if($user != null){
                // fill the session with data and allow login, then redirect to home
            }
            else{
                // return error alert
            }
        }
    }
}
