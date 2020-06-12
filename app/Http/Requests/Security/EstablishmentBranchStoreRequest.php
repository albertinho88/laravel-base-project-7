<?php

namespace App\Http\Requests\Security;

use Illuminate\Foundation\Http\FormRequest;

class EstablishmentBranchStoreRequest extends FormRequest
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
            'establishment_id' => 'required',
            'code' => 'required|unique:sec_establishment_branches|size:3',
            'business_name' => 'required|max:255'
        ];
    }
}
