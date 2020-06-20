<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Message;

class HomeController extends Controller
{
    public function showHome(){
        $messages_response = [];
        $messages = Message::where('is_public', 1)->get();
        if($messages -> isNotEmpty()){
            foreach($messages as $message){
                // get the message data
                $text = $message -> message;
                $timestamp = $message -> created_at;
                $sender_name = null;
                if($message -> is_known == 1){
                    $sender = User::where('id', $message -> from_id)->first();
                    if($sender != null){
                        $sender_name = $sender -> full_name;
                    }
                }
                $message_response = [
                    'from' => $sender_name,
                    'message' => $text,
                    'time' => $timestamp
                ];
                $messages_response[] = $message_response;
            }
        }

        return view('home')->with('messages_response', $messages_response);
    }
}
