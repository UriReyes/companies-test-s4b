<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    /*public function authorize()
    {
    return false;
    }*/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'company_id' => 'nullable|exists:companies,id',
            'email' => [
                'nullable',
                'email',
                Rule::unique('employees', 'email')->ignore($this->employee),
            ],
            'phone' => 'nullable|numeric|digits:10',
            'gender' => 'nullable|in:M,F',
        ];
    }
}
