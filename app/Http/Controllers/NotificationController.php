<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //
    public function view_controller(){
        return view('notifications.notifications_view');
    }
}