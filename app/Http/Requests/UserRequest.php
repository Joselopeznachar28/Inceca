<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'lastname' => 'required',
            'identification' => 'required|digits_between:8,8',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido',

            'lastname.required' => 'Este campo es requerido',

            'identification.required' => 'Este campo es requerido',
            'identification.digits_between' => 'Este campo debe tener 8 digitos de tipo numerico',

            'username.required' => 'Este campo es requerido',

            'email.required' => 'Este campo es requerido',
            'email.email' => 'Este campo debe ser de tipo email',

            'password.required' => 'Este campo es requerido',
            'password.confirmed' => 'Las contraseñas no son iguales',
        ];
    }
}
