<?php

namespace App\Services\Rules;

use App\Exports\RulesExport;
use App\Models\Rule;
use Maatwebsite\Excel\Facades\Excel;

class RuleService
{
    public function fetch()
    {
        $rules = Rule::with('conditions')
            ->get();

        return view('admin.rules.index', ['rules' => $rules]);
    }

    public function createRule()
    {
        return view('admin.rules.create');
    }

    public function storeRule(array $data): Rule
    {
        $rule = Rule::create([
            'type'              => $data['type'],
            'priority'          => $data['priority'],
            'notification_text' => $data['notification_text'],
        ]);

        foreach ($data['conditions'] as $condition) {
            $rule->conditions()->create([
                'operator' => $condition['operator'],
                'field'    => $condition['field'],
                'value'    => $condition['value'],
            ]);
        }

        return $rule;
    }

    public function editRule($rule)
    {
        return view('admin.rules.edit', ['rule' => $rule]);
    }

    public function updateRule(array $data, Rule $rule): Rule
    {
        $rule->update([
            'type'              => $data['type'],
            'priority'          => $data['priority'],
            'notification_text' => $data['notification_text'],
        ]);

        $rule->conditions()->delete();

        foreach ($data['conditions'] as $condition) {
            $rule->conditions()->create([
                'operator' => $condition['operator'],
                'field'    => $condition['field'],
                'value'    => $condition['value'],
            ]);
        }

        return $rule;
    }

    public function deleteRule($rule)
    {
        $rule->delete();
        return redirect()->route('rules.index');
    }

    public function showImportForm()
    {
        return view('admin.rules.import');
    }

    public function importRules()
    {
        dd('sd');
    }

    public function exportRules()
    {
        return Excel::download(new RulesExport, 'rules.xlsx');
    }
}
