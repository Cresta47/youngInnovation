<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
        $company = $this->route('company');

        $rules = [
            'name'      => 'required|unique:companies,name',
            'email'     => 'nullable|email',
            'logo'      => 'nullable|image|mimes:jpg,png,jpeg|dimensions::min_width=100,min_height=100',
            'website'   => 'nullable|url',
        ];

        if($this->method() == 'POST'){
            return  $rules;
        }

        if($this->method() == 'PUT'){
            $rules['name'] = 'required|unique:companies,name,' . $company;
            return  $rules;
        }
    }
}
