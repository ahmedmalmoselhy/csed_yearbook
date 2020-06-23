<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\User;
use App\Message;

class MessageController extends Controller
{
    public function postPublicMessage(){
        if(request()->session()->has('id')){
            $sender_id = request('from');
            $message = request('addPost');
            $is_known_val = request('anonymus');
            if($is_known_val == 'on'){
                $is_known = 1;
            }
            else{
                $is_known = 0;
            }
            $is_public = 1;
            $is_visible = 1;

            $new_message = new Message;
            $new_message -> from_id = $sender_id;
            $new_message -> message = $message;
            $new_message -> is_known = $is_known;
            $new_message -> is_visible = $is_visible;
            $new_message -> is_public = $is_public;
            $new_message -> save();

            return redirect('home');
        }
        else{
            return redirect('login');
        }

    }

    public function showMyMessages(){
        if(request()->session()->has('id')){
            $response = [];
            $messages = Message::where('to_id', Session::get('id'))->get();
            if($messages -> isNotEmpty()){
                foreach($messages as $message){
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
            return view('received')->with('messages', $response);
        }
    }
}
