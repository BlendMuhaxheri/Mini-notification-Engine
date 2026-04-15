<?php

namespace App\Listeners;

use App\Enums\Conditions\ConditionOperator;
use App\Events\UserActionTriggered;
use App\Models\Rule;
use App\Notifications\NotifyUser;
use App\Services\Rules\RuleEngineService;

class RuleEngineListener
{
    public $service;
    /**
     * Create the event listener.
     */
    public function __construct(RuleEngineService $service)
    {
        $this->service = $service;
    }

    /**
     * Handle the event.
     */
    public function handle(UserActionTriggered $event): void
    {
        $this->service->process($event->userAction);
    }
}
