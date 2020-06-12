<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'uni_code' => 'required|max:100|unique:inv_products|alpha_dash',
            'product_category_id' => 'required',
            'product_brand_id' => 'required',
            'name' => 'required|max:255',
            'state' => 'required|max:1'
        ];
    }
}
