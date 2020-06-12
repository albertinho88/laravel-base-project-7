<?php

namespace App\Http\Requests\Security;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
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
            'code' => 'required|min:5|max:20|unique:sec_roles|alpha_dash',
            'name' => 'required|max:50',
            'level' => 'required|numeric|integer'
        ];
    }
}
