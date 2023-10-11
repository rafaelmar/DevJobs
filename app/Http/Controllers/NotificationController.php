<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $notifications = auth()->user()->unreadNotifications;

        // clean notification, markAsRead eliminate notificatons when you already see it

        auth()->user()->unreadNotifications->markAsRead();

        return view('notification.index', [
            'notifications' => $notifications
        ]);
    }
}
