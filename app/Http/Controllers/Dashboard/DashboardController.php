<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Rule;
use App\Models\User;
use App\Models\NotificationSent;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $data = [
            'totalRules' => Rule::count(),
            'totalNotifications' => NotificationSent::count(),
            'totalUsers' => User::count(),
        ];

        if ($user->role == 'admin') {
            return view('admin.dashboard', $data);
        }

        return view('user.dashboard', $data);
    }
}
