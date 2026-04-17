<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['actions', 'notificationsSent'])
            ->orderByDesc('created_at')
            ->paginate(8);

        return view('admin.users.index', ['users' => $users]);
    }
}
