<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            //
            'pro_name' => 'required|min:5',
            'brand_id'=> ['required', 'integer', function($atrribute, $value, $fail){
                if($value==0){
                    $fail('Must choose brand.');
                }
            }],
            'color_id'=> ['required', 'integer', function($atrribute, $value, $fail){
                if($value==0){
                    $fail('Must choose color.');
                }
            }],
            'pro_ram'=> ['required', 'integer', function($atrribute, $value, $fail){
                if($value==0){
                    $fail('Must choose ram.');
                }
            }],
            'pro_iMemory'=> ['required', 'integer', function($atrribute, $value, $fail){
                if($value==0){
                    $fail('Must choose internal memory.');
                }
            }],
            'pro_oSystem'=> ['required', function($atrribute, $value, $fail){
                if($value=="0"){
                    $fail('Must choose operating system.');
                }
            }],
            'pro_warrantyPeriod'=> ['required', function($atrribute, $value, $fail){
                if($value== '0'){
                    $fail('Must choose warranty period.');
                }
            }],
            'pro_image' => 'required|mimes:png,jpg,jpeg',
            'pro_image1' => 'required|mimes:png,jpg,jpeg',
            'pro_image2' => 'required|mimes:png,jpg,jpeg',
            'pro_image3' => 'required|mimes:png,jpg,jpeg',
            'pro_image4' => 'required|mimes:png,jpg,jpeg',
            'pro_quatity' => 'required|integer',
            'pro_origin' => 'required|min:5',
            'pro_price' => 'required|integer',
            'pro_reducedPrice' => 'required|integer',
            'pro_launchDate' => 'required|date',
        ];
    }

    //message
    public function messages()
    {
        return [
            // pro_name
            'pro_name.required' => 'Name field is required.',
            'pro_name.min' => 'Name must be from :min or more characters.',
            // brand_id
            'brand_id.required' => 'Brand field is required.',
            'brand_id.integer' => 'Brand is malformed.',
            // color_id
            'color_id.required' => 'Color field is required.',
            'color_id.integer' => 'Color is malformed.',
            // pro_ram
            'pro_ram.required' => 'RAM field is required.',
            'pro_ram.integer' => 'RAM is malformed.',
            // pro_iMemory
            'pro_iMemory.required' => 'Internal memory field is required.',
            'pro_iMemory.integer' => 'Internal memory is malformed.',
            // pro_warrantyPeriod
            'pro_warrantyPeriod.required' => 'Warranty period field is required.',
            'pro_warrantyPeriod.integer' => 'Warranty period is malformed.',
            // pro_oSystem
            'pro_oSystem.required' => 'Operating system field is required.',
            // pro_image
            'pro_image.required' => 'Image Main field is required.',
            'pro_image.mimes' => 'Image Main must be a file of type: png, jpg, jpeg.',
            // pro_image1
            'pro_image1.required' => 'Image 01 field is required.',
            'pro_image1.mimes' => 'Image 01 must be a file of type: png, jpg, jpeg.',
            // pro_image2
            'pro_image2.required' => 'Image 02 field is required.',
            'pro_image2.mimes' => 'Image 02 must be a file of type: png, jpg, jpeg.',
            // pro_image3
            'pro_image3.required' => 'Image 03 field is required.',
            'pro_image3.mimes' => 'Image 03 must be a file of type: png, jpg, jpeg.',
            // pro_image4
            'pro_image4.required' => 'Image 04 field is required.',
            'pro_image4.mimes' => 'Image 04 must be a file of type: png, jpg, jpeg.',
            // pro_quatity
            'pro_quatity.required' => 'Quatity field is required.',
            'pro_quatity.integer' => 'Quatity is malformed.',
            'pro_quatity.max' => 'Quatity must be less than :max characters.',
            // pro_origin
            'pro_origin.required' => 'Origin field is required.',
            'pro_origin.min' => 'Origin must be from :min or more characters.',
            // pro_price
            'pro_price.required' => 'Price field is required.',
            'pro_price.integer' => 'Price is malformed.',
            'pro_price.max' => 'Price must be less than :max characters.',
            // pro_reducedPrice
            'pro_reducedPrice.required' => 'Reduced price field is required.',
            'pro_reducedPrice.integer' => 'Reduced price is malformed.',
            // pro_launchDate
            'pro_launchDate.required' => 'Launch date field is required.',
            'pro_launchDate.date' => 'Launch date is invalid',
        ];
    }
}
