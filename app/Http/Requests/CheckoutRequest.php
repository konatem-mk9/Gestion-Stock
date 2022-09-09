<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
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
        $emailValidation = auth()->user() ? 'required|email' : 'sometimes|nullable|email|unique:users';
        return [
            'email' =>  $emailValidation,
            // 'name' => 'required',
            // 'address' => 'required',
            'city' => 'required',
            // 'province' => 'required',
            // 'postalcode' => '',
            'phone' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Cet email est déjà pris, si vous avez un compte Connectez-vous pour continuer svp',
        ];
    }
}
