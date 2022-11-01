<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'order_quantity' => 'required|integer',
            'order_status'=> 'required|integer',
        ];
    }

    public function messages()
    {
        return [

            'order_quantity.required' => 'Quantity field is required.',
            'order_quantity.integer' => 'Quantity is malformed.',

            'order_status.required' => 'Status field is required.',
            'order_status.integer' => 'Status is malformed.',
        ];
    }
}
