<?php

namespace App\Events;

use App\Models\UserAction;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserActionTriggered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userAction;

    /**
     * Create a new event instance.
     */
    public function __construct(UserAction $userAction)
    {
        $this->userAction = $userAction;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
