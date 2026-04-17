<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\NotificationSent;
use Illuminate\Http\Request;

class NotificationSentController extends Controller
{
    public function index()
    {
        $sent = NotificationSent::with(['user', 'rule'])
            ->latest()
            ->get();

        return view(
            'admin.notifications.index',
            ['notifications' => $sent]
        );
    }
}
