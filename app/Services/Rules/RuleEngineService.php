<?php

namespace App\Services\Rules;

use App\Enums\Conditions\ConditionOperator;
use App\Models\Rule;
use App\Models\UserAction;
use App\Notifications\NotifyUser;

class RuleEngineService
{
    public function process(UserAction $userAction)
    {
        $rules = Rule::with('conditions')
            ->where('type', $userAction->action_type)
            ->get();

        foreach ($rules as $rule) {
            if (!$userAction->action_type == $rule->type) {
                continue;
            }

            foreach ($rule->conditions as $condition) {
                $operator = ConditionOperator::from($condition->operator);

                $isMatch = $operator->matches(
                    $userAction->payload[$condition->field] ?? null,
                    $condition->value
                );

                if ($isMatch) {
                    $userAction->user->notify(
                        (new NotifyUser($rule))
                    );

                    break;
                }
            }
        }
    }
}
