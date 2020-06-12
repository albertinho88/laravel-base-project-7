<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryUpdateRequest extends FormRequest
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
            'name' => 'required|max:50',            
            'state' => 'required|max:1',
            'parent_id' => 'different:product_category_id'
        ];
    }

    public function messages()
    {
        return [
            'parent_id.different' => 'Error de recursividad. Una categoría no puede ser escogida como su propia Categoría Padre.'
        ];
    }
}
