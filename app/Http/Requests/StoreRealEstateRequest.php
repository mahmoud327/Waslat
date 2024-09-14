<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRealEstateRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Allow all users to make this request. Modify as needed.
    }

    public function rules()
    {
        return [
            'type' => 'string',
            'price' => 'required|numeric',
            'phone' => 'string',
            'number_of_rooms' => 'string',
            'bathrooms_of_rooms' => 'string',
            'hall_number' => 'string',
            'number_of_council_rooms' => 'string',
            'land_area' => 'string',
            'street' => 'string',
            'number_of_streets' => 'string',
            'street_area' => 'string',
            'street_facing' => 'string',
            'electricity' => 'boolean',
            'water' => 'boolean',
            'depth' => 'string',
            'features_facilities' => 'string',
            'description' => 'string',
            'real_estate_characteristics' => 'string',
            'whatsup' => 'string',
            'email' => 'string',
            'marketer_name' => 'string',
            'license_number' => 'string',
            'city_id' => 'required|exists:cities,id',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'file|mimes:jpeg,png,jpg,gif',
            'videos.*' => 'file',
        ];
    }
}
