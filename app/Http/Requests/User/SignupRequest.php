<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
        return [
            'user_name' => 'required|min:5',
            'user_email' => 'required|email',
            'user_phoneNumber' => 'required|integer',
            'user_address' => 'required|min:5',
            'user_password' => 'required|min:6',
            //'confirm-password' => 'required|min:6|same:user_password',
        ];
    }

    public function messages() // thong bao
    {
        return [

            'user_name.required' => 'Name field is required.',
            'user_name.min' => 'Name must be from :min or more characters.',

            'user_email.required' => 'Name field is required.',
            'user_email.email' => 'Email dien khong hop le',

            'user_phoneNumber.required' => 'Phone Number field is required.',
            'user_phoneNumber.integer' => 'Phone Number is malformed.',
            //'user_phoneNumber.min' => 'Phone Number must be from :min or more characters.',
            //'user_phoneNumber.max' => 'Phone Number must be less than :max characters.',

            'user_address.required' => 'Address field is required.',
            'user_address.min' => 'Address must be from :min or more characters.',

            'user_password.required' => 'Password field is required.',
            'user_password.min' => 'Password must be from :min or more characters.',

        ];
    }
}
