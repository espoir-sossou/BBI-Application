<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getUnreadNotifications()
    {
        $adminId = session('user_id');
        $notifications = Notification::where('user_id', $adminId)
            ->where('is_read', false)
            ->get();

        return response()->json($notifications);
    }

}
