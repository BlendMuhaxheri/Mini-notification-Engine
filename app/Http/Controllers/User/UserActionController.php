<?php

namespace App\Http\Controllers\User;

use App\Events\UserActionTriggered;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserActionRequest;
use App\Models\UserAction;
use Illuminate\Http\Request;

class UserActionController extends Controller
{
    public function store(StoreUserActionRequest $request)
    {
        $userAction = UserAction::create([
            ...$request->validated(),
            'user_id' => auth()->id()
        ]);

        event(new UserActionTriggered($userAction));

        return redirect()->route('dashboard');
    }
}
