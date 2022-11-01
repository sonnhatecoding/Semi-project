<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'brand_name' => 'required',
            'brand_logo' => 'required|mimes:png,jpg,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'brand_name.required' => 'Name field is required.',
            'brand_logo.required' => 'Logo field is required.',
            'brand_logo.mimes' => 'Logo must be a file of type: png, jpg, jpeg.',
        ];
    }

}
