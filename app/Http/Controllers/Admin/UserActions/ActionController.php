<?php

namespace App\Http\Controllers\Admin\UserActions;

use App\Http\Controllers\Controller;
use App\Models\UserAction;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function index()
    {
        $actions = UserAction::with('user')
            ->orderByDesc('created_at')
            ->paginate(8);

        return view(
            'admin.actions.index',
            ['actions' => $actions]
        );
    }
}
