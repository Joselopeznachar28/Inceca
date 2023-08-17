<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'state' => 'min:5|max:50|required',
            'city' => 'min:5|max:50|required',
            'address' => 'min:5|required',
            'company' => 'required',
            'identification' => 'required|digits_between:9,9',
            'phone' => 'required|numeric|min:11',
            'email' => 'required|email',
            'country' => 'min:5|max:50|required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'category_id.required' => 'Este campo es requerido',

            'name.required' => 'Este campo es requerido',

            'state.required' => 'Este campo es requerido',
            'state.min' => 'Este campo requiere minimo 5 digitos',
            'state.max' => 'Este campo requiere maximo 50 digitos',

            'city.required' => 'Este campo es requerido',
            'city.min' => 'Este campo requiere minimo 5 digitos',
            'city.max' => 'Este campo requiere maximo 50 digitos',

            'company.required' => 'Este campo es requerido',

            'address.required' => 'Este campo es requerido',
            'address.min' => 'Este campo debe contener almenos 5 digitos',

            'identification.required' => 'Este campo es requerido',
            'identification.digits_between' => 'Este campo debe tener 9 digitos de tipo numerico',

            'phone.numeric' => 'Este campo es de tipo numerico',
            'phone.min' => 'Este campo debe contener almenos 11 digitos',
            'phone.required' => 'Este campo es requerido',

            'email.required' => 'Este campo es requerido',
            'email.numeric' => 'Este campo debe ser de tipo email',

            'country.required' => 'Este campo es requerido',
            'country.min' => 'Este campo requiere minimo 5 digitos',
            'country.max' => 'Este campo requiere maximo 50 digitos',

        ];
    }
}
