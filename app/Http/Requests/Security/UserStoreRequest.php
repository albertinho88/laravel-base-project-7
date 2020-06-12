<?php

namespace App\Http\Requests\Security;

use App\Rules\EmailUniquePerEstablishmentBranch;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'idtype_catdetail' => '',
            'identification' => 'required_with:idtype_catdetail',
            'email' => ['required','email',new EmailUniquePerEstablishmentBranch]
        ];
    }
}
