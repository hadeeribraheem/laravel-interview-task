<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->get();
        //dd($notifications);

        return view('notifications.show_notification',compact('notifications')) ;
    }
}
