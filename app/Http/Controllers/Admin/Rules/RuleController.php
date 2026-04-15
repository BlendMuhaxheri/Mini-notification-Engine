<?php

namespace App\Http\Controllers\Admin\Rules;

use App\Http\Controllers\Controller;
use App\Http\Requests\Rules\StoreRuleRequest;
use App\Http\Requests\Rules\UpdateRuleRequest;
use App\Models\Rule;
use App\Services\Rules\RuleService;

class RuleController extends Controller
{
    public RuleService $ruleService;

    public function __construct(RuleService $service)
    {
        $this->ruleService = $service;
    }

    public function index()
    {
        return $this->ruleService->fetch();
    }

    public function create()
    {
        return $this->ruleService->createRule();
    }

    public function store(StoreRuleRequest $request)
    {
        $this->ruleService->storeRule($request->validated());

        return redirect()->route('rules.index');
    }

    public function edit(Rule $rule)
    {
        return $this->ruleService->editRule($rule);
    }

    public function update(UpdateRuleRequest $request, Rule $rule)
    {
        $this->ruleService->updateRule(
            $request->validated(),
            $rule
        );

        return redirect()->route('rules.index');
    }

    public function destroy(Rule $rule)
    {
        $this->ruleService->deleteRule($rule);

        return redirect()->route('rules.index');
    }

    public function showImport()
    {
        return $this->ruleService->showImportForm();
    }

    public function import()
    {
        dd('sd');
    }

    public function export()
    {
        return $this->ruleService->exportRules();
    }
}
