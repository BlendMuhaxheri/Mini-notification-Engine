<?php

namespace App\Services\Rules;

use App\Enums\Conditions\ConditionOperator;
use App\Models\Rule;
use App\Models\UserAction;
use App\Notifications\NotifyUser;

use function Illuminate\Support\now;

class RuleEngineService
{
    public function process(UserAction $userAction)
    {
        $rules = Rule::with('conditions')
            ->where('type', $userAction->action_type)
            ->get();

        $winnerRule = null;
        $bestScore  = 0;

        foreach ($rules as $rule) {
            $score = $this->findRuleWithMostMatches($rule, $userAction);

            if ($score > $bestScore) {
                $bestScore  = $score;
                $winnerRule = $rule;
            }
        }

        if ($winnerRule && $bestScore > 0) {
            $userAction->user->notify(new NotifyUser($winnerRule));

            $userAction->user
                ->notificationsSent()
                ->create([
                    'user_id' => $userAction->user,
                    'rule_id' => $winnerRule->id,
                    'message' => $winnerRule->notification_text,
                    'type'    => $winnerRule->type,
                    'sent_at' => now()
                ]);
        }
    }

    public function findRuleWithMostMatches($rule, UserAction $userAction): int
    {
        $score = 0;

        foreach ($rule->conditions as $condition) {
            $operator  = ConditionOperator::from($condition->operator);
            $userValue = $userAction->payload[$condition->field] ?? null;

            $conditionVals = explode(',', $condition->value);

            foreach ($conditionVals as $val) {
                if ($operator->matches($userValue, trim($val))) {
                    $score++;
                }
            }
        }

        return $score;
    }
}
