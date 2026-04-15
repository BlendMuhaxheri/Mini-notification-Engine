<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserActionRequest extends FormRequest
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
            'action_type' => [
                'required',
                'string',
                'in:message,action_performed,login'
            ],

            'payload' => [
                'required',
                'array'
            ],

            'payload.text' => [
                'required_if:action_type,message',
                'nullable',
                'string',
                'max:5000'
            ],

            'payload.action' => [
                'required_if:action_type,action_performed',
                'nullable',
                'string',
                'max:255'
            ],
        ];
    }
}
