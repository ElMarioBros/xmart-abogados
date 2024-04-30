<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLegalCaseRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'project_name' => 'string',
            'form_type' => 'string',
            'client_name' => 'string',
            'defendant_name' => 'string',
            'payer_name' => 'string',
            'client_email' => 'string',
            'defendant_email' => 'string',
            'payer_email' => 'string',
            'client_phone' => 'string',
            'defendant_phone' => 'string',
            'payer_phone' => 'string',
            'client_address' => 'string',
            'defendant_address' => 'string',
            'payer_address' => 'string',
            'file_number' => 'string|unique:legal_cases,file_number',
            'observations' => 'string|nullable',
            'law_firm_validation' => 'nullable',
            'drawer_number' => 'string|nullable',
            'satisfaction_level' => 'nullable',
            'honorarium' => 'string',
        ];
    }
}
