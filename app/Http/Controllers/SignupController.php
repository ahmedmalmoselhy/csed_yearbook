<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class SignupController extends Controller
{
    public function signup(Request $request){
        $full_name = $request['full_name'];
        $username = $request['username'];
        $password = $request['password'];
        if($full_name != null && $username != null && $password != null){
            $user = new User;
            $user -> username = $username;
            $user -> full_name = $full_name;
            $user -> password = $password;
            if($user -> save()){
                return redirect('login');
            }
            else{
                return alert('can not sign up');
            }
        }
        else{
            return alert('fill needed data');
        }
    }
}
