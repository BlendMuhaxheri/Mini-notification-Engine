<?php

namespace App\Http\Requests\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRuleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => [
                'required',
                'string',
                'in:message,action_performed,login'
            ],
            'priority' => 'required|integer',
            'notification_text' => 'required|string|max:155',
            'conditions' => 'required|array|min:1',
            'conditions.*.field' => 'required|string|max:48',
            'conditions.*.value' => 'required|string|max:48',
            'conditions.*.operator' => 'required|string|max:48',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'priority' => (int) $this->priority,
        ]);
    }
}
