<?php

namespace App\Http\Requests\Security;

use Illuminate\Foundation\Http\FormRequest;

class MenuOptionUpdateRequest extends FormRequest
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
            'label' => 'required|max:100',
            'icon' => 'max:20',
            'url' => 'required|max:500',
            'type' => 'required|max:10',
            'state' => 'required|max:1',
            'order' => 'required|numeric|integer',
            'menu_parent_id' => 'different:menu_id'
        ];
    }

    public function messages()
    {
        return [
            'menu_parent_id.different' => 'Error de recursividad. Una opción de menú no puede ser escogida como su propio Menú Padre.'
        ];
    }
}
