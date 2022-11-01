<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'user_name' => 'required|min:5',
            'user_email' => 'required|email',
            'user_phoneNumber' => 'required|min:9|integer',
            'user_password' => 'required|min:6',
            'confirm-password' => 'required|min:6|same:user_password',
            'user_address' => 'required|min:5',
            'ur_id'=> ['required', 'integer', function($atrribute, $value, $fail){
                if($value==0){
                    $fail('Must choose role');
                }
            }]
        ];
    }

    public function messages()
    {
        return [

            'user_name.required' => 'Name field is required.',
            'user_name.min' => 'Name must be from :min or more characters.',

            'user_email.required' => 'Email field is required.',
            'user_email.email' => 'Email is malformed.',

            'user_phoneNumber.required' => 'Phone Number field is required.',
            'user_phoneNumber.integer' => 'Phone Number is malformed.',
            'user_phoneNumber.min' => 'Phone Number must be from :min or more characters.',
            //'user_phoneNumber.max' => 'Phone Number must be less than :max characters.',

            'user_password.required' => 'Password field is required.',
            'user_password.min' => 'Password must be from :min or more characters.',

            'confirm-password.required' => 'confirm-password field is required.',
            'confirm-password.same'=>'confirm-password are not the same password must match same value',
            'confirm-password.min'=>'confirm-password length must be greater than :min characters',

            'user_address.required' => 'Address field is required.',
            'user_address.min' => 'Address must be from :min or more characters.',

            'ur_id.required' => 'Role field is required.',
            'ur_id.integer' => 'Role is malformed.',
        ];
    }
}
