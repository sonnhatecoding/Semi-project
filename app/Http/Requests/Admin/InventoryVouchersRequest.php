<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InventoryVouchersRequest extends FormRequest
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
            'iv_quantity' => 'required|integer',
            'iv_status'=> 'required|integer',
            'iv_type'=> 'required|integer',
        ];
    }

    public function messages()
    {
        return [

            'iv_quantity.required' => 'Quantity field is required.',
            'iv_quantity.integer' => 'Quantity is malformed.',

            'iv_status.required' => 'Status field is required.',
            'iv_status.integer' => 'Status is malformed.',

            'iv_type.required' => 'Type field is required.',
            'iv_type.integer' => 'Type is malformed.',
            
        ];
    }
}
