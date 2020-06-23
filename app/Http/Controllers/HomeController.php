<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Message;

class HomeController extends Controller
{
    public function showHome(){
        // check if session has id
        if(request()->session()->has('id')){
            // get all messages
            $messages_response = [];
            $messages = Message::where('is_public', 1)->get()->sortBy('created_at');
            if($messages -> isNotEmpty()){
                foreach($messages as $message){
                    // get the message data
                    $text = $message -> message;
                    $timestamp = $message -> created_at;
                    $sender_name = null;
                    $sender = User::where('id', $message -> from_id)->first();
                    if($message -> is_known == 1){
                        if($sender != null){
                            $sender_name = $sender -> full_name;
                        }
                    }
                    $message_response = [
                        'from' => $sender_name,
                        'sender_id' => $sender -> id,
                        'message' => $text,
                        'time' => $timestamp,
                        'is_known' => $message -> is_known
                    ];
                    $messages_response[] = $message_response;
                }
            }
            // get all members
            $members = User::all()->sortBy('full_name');
            $members_response = [];
            foreach($members as $member){
                $mem = [
                    'id' => $member -> id,
                    'full_name' => $member -> full_name
                ];
                $members_response[] = $mem;
            }

            return view('home')->with([
                    'messages_response' => $messages_response,
                    'users' => $members_response
                ]);
        }
        else{
            return redirect('signup');
        }

    }
}
