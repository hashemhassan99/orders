<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{


    public function notification()
    {
        auth()->user()->unreadNotifications();


        return view('notifications',[
            'notifications' => auth()->user()->notifications()->paginate(5),
        ]);
    }
}
