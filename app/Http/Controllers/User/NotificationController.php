<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Mark a specific notification as read and redirect to its URL.
     */
    public function read($id)
    {
        $notification = auth()->user()->notifications()->findOrFail($id);
        
        $notification->markAsRead();

        // Redirect to the URL provided in the notification data, or back
        if (isset($notification->data['url'])) {
            return redirect($notification->data['url']);
        }

        return redirect()->back();
    }

    /**
     * Mark all unread notifications as read.
     */
    public function readAll()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
