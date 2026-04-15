<?php

namespace App\Imports;

use App\Models\Rule;
use Maatwebsite\Excel\Concerns\ToModel;

class RulesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $rule = Rule::updateOrCreate(
            [
                'id' => $row['id']
            ],
            [
                'type' => $row['type'],
                'priority' => $row['priority'],
                'notification_text' => $row['notification_text']
            ]
        );

        return $rule;
    }
}
