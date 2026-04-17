<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'min:3', 'max:255'],
            'mobile' => ['required', 'string', 'min:10'],
            'fin' => ['required', 'min:3'],
            'address' => ['required', 'string', 'min:3'],
            'material' => ['required', 'string', 'min:1'],
            'seriya' => ['required', 'string', 'min:3'],
            'sign' => ['required', 'sometimes']
        ];
    }
}