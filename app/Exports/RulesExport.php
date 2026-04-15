<?php

namespace App\Exports;

use App\Models\Rule;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RulesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Rule::with('conditions')->get()->map(function ($rule) {
            return [
                'type'              => $rule->type,
                'priority'          => $rule->priority,
                'notification_text' => $rule->notification_text,
                'conditions'        => $rule->conditions->pluck('field')->implode(', '),
            ];
        });
    }

    public function headings(): array
    {
        return ['type', 'priority', 'notification_text', 'conditions'];
    }
}
