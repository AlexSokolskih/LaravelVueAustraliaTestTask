<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexHousesRequest extends FormRequest
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
            'name' => 'alpha_dash',
            'priceStart' => 'numeric',
            'priceFinish' => 'numeric',
            'bedrooms' => 'integer',
            'bathrooms' => 'integer',
            'storeys' => 'integer',
            'garages' => 'integer',
            //
        ];
    }
}
