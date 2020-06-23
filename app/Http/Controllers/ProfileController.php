<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\User;
use App\Message;
class ProfileController extends Controller
{
    public function showProfile(){
        if(request()->session()->has('id')){
            $profile_id = request('id');
            $profile = User::where('id', $profile_id)->first();
            if($profile != null){
                $user = [
                    'id' => $profile_id,
                    'full_name' => $profile -> full_name
                ];
                $response = [];
                // get all public user messages
                $messages = Message::where(['to_id' => $profile -> id, 'is_visible' => 1])->get()->sortByDesc('created_at');
                if($messages -> isNotEmpty()){
                    foreach($messages as $message){
                        // get the sender
                        $sender_name = null;
                        if($message -> is_known == 1){
                            $sender = User::where('id', $message -> from_id)->first();
                            if($sender != null){
                                $sender_name = $sender -> full_name;
                            }
                        }
                        $mes = [
                            'id' => $message -> id,
                            'from_id' => $message -> from_id,
                            'message' => $message -> message,
                            'is_known' => $message -> is_known,
                            'sender' => $sender_name,
                            'timestamp' => $message -> created_at
                        ];
                        $response[] = $mes;
                    }
                }
                return view('profile')->with([
                    'user' => $user,
                    'messages' => $response
                ]);
            }
            else{
                return redirect('home')->with('profile', 'Can not find member');
            }
        }
        else{
            return redirect('login')->with('login', 'You must login first');
        }
    }
}
