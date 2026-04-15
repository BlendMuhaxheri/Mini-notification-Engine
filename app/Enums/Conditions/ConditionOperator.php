<?php

namespace App\Enums\Conditions;

enum ConditionOperator: string
{
    case IN           = 'in';
    case NOT_IN       = 'not_in';
    case EQUALS       = 'equals';
    case CONTAINS     = 'contains';
    case ENDS_wITH    = 'ends_with';
    case NOT_EQAULS   = 'not_equals';
    case STARTS_WITH  = 'starts_with';
    case NOT_CONTAINS = 'not_contains';

    public function matches(mixed $actual, mixed $expected): bool
    {
        return match ($this) {
            self::IN           => in_array($actual, explode(',', $expected)),
            self::NOT_IN       => !in_array($actual, explode(',', $expected)),
            self::EQUALS       => $actual == $expected,
            self::CONTAINS => collect(explode(',', $expected))
                ->some(fn($value) => str_contains(
                    strtolower((string)$actual),
                    strtolower(trim($value))
                )),
            self::ENDS_wITH    => str_ends_with((string)$actual, (string)$expected),
            self::NOT_EQAULS   => $actual != $expected,
            self::NOT_CONTAINS => !str_contains((string)$actual, (string)$expected),
            self::STARTS_WITH  => str_starts_with((string)$actual, (string)$expected),
        };
    }
}
