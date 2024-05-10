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
            'client_type' => 'string',
            'defendant_type' => 'string',
            'payer_name' => 'string',
            'client_email' => 'string|nullable',
            'defendant_email' => 'string|nullable',
            'payer_email' => 'string|nullable',
            'client_phone' => 'string|nullable',
            'defendant_phone' => 'string|nullable',
            'payer_phone' => 'string|nullable',
            'client_address' => 'string|nullable',
            'defendant_address' => 'string|nullable',
            'payer_address' => 'string|nullable',
            'file_number' => 'string',
            'file_number_type' => 'string',
            'authority_criminal' => 'string',
            'authority_federal' => 'string',
            'observations' => 'string|nullable',
            'law_firm_validation' => 'nullable',
            'drawer_number' => 'string|nullable',
            'satisfaction_level' => 'nullable',
            'honorarium' => 'string',
            'honorarium_currency' => 'string',
        ];
    }
}
