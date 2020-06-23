<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\User;

class LoginController extends Controller
{
    public function login(){
        $username = request('username');
        $password = request('password');
        if($username != null && $password != null){
            $user = User::where(['username' => $username,
                'password' => $password])
                ->first();
            if($user != null){
                // fill the session with data and allow login, then redirect to home
                Session::put('id', $user -> id);
                return redirect('home');

            }
            else{
                // return error alert

            }
        }
    }

    public function logout(){
        session()->forget('id');
        return redirect('/');
    }
}
