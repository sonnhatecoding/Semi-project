<?php

namespace App\Http\Requests\Admin;

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

    //rule
    public function rules()
    {
        return [
            'cp_name' => 'required|min:5',
            'cp_email' => 'required|email',
            'cp_phoneNumber' => 'required|min:9|integer',
            'cp_address' => 'required|min:5',
        ];
    }

    //message
    public function messages()
    {
        return [

            'cp_name.required' => 'Name field is required',
            'cp_name.min' => 'Name must be from :min or more characters.',

            'cp_email.required' => 'Email field is required',
            'cp_email.email' => 'Email is malformed.',

            'cp_phoneNumber.required' => 'Phone Number field is required',
            'cp_phoneNumber.integer' => 'Phone Number is malformed.',
            'cp_phoneNumber.min' => 'Phone Number must be from :min or more characters.',

            'cp_address.required' => 'Address field is required',
            'cp_address.min' => 'Address must be from :min or more characters.',
        ];
    }
}
