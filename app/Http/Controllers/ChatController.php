<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Event;
use App\User;
use Pusher\Pusher;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');
    }

    // public function chat()
    // {
    //     return view('chat.index');
    // }

    public function index()
    {
        //select all users except logged in user
        $users = User::where('id', '!=', Auth::id())->get();
        return view('chat.index',['users'=>$users]);
    }

    public function getMessage($user_id)
    {
        $my_id = Auth::id();
        
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from',$my_id)->where('to',$user_id);
        })->orWhere(function ($query) use ($user_id, $my_id){
            $query->where('from', $user_id)->where('to', $my_id);
        })->get();
        
        return view('messages.index',['messages'=>$messages]);
        
    }

    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; // message will be unread when sending message
        $data->save();

         // pusher
         $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }
    //old
    // public function push(request $request)
    // {
    //     $user = User::find(Auth::id());
    //     $this->chatSession($request);
    //     event(new Event($request->pesan));
    // }

    // public function textsession()
    // {
    //     return session('textsession');
    // }

    // public function chatSession(request $request)
    // {
    //     session()->put('textsession',$request->textsession);
    // }
}
