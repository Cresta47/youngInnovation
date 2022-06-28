<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $employee = $this->route('employee');

        $rules = [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'company_id'    => 'required|exists:companies,id',
            'email'         => 'nullable|email',
            'phone'         => 'nullable|digits:10',
        ];

        if($this->method() == 'POST'){
            return  $rules;
        }

        if($this->method() == 'PUT'){
            return  $rules;
        }
    }
}
