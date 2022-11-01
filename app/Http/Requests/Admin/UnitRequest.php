<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UnitRequest extends FormRequest
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
            'unit_name' => 'required|min:5',
            'unit_email' => 'required|email',
            'unit_phoneNumber' => 'required|min:9|integer',
            'unit_address' => 'required|min:5',
            'cp_id'=> ['required', 'integer', function($atrribute, $value, $fail){
                if($value==0){
                    $fail('Must choose company.');
                }
            }]
        ];
    }

    //message
    public function messages()
    {
        return [

            'unit_name.required' => 'Name field is required.',
            'unit_name.min' => 'Name must be from :min or more characters.',

            'unit_email.required' => 'Email field is required.',
            'unit_email.email' => 'Email is malformed.',

            'unit_phoneNumber.required' => 'Phone Number field is required.',
            'unit_phoneNumber.integer' => 'Phone Number is malformed.',
            'unit_phoneNumber.min' => 'Phone Number must be from :min or more characters.',

            'unit_address.required' => 'Address field is required.',
            'unit_address.min' => 'Address must be from :min or more characters.',

            'cp_id.required' => 'Công ty field is required.',
            'cp_id.integer' => 'Công ty is malformed.',
        ];
    }
}
