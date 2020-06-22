<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class SignupController extends Controller
{
    public function signup(){
        $full_name = request('full_name');
        $username = request('username');
        $password = request('password');
        $c_password = request('confirmPassword');
        if($full_name != null && $username != null && $password != null && $c_password != null){
            $user = new User;
            $user -> username = $username;
            $user -> full_name = $full_name;
            $user -> password = $password;
            $user -> save();
            return view('login');
        }
    }
}
