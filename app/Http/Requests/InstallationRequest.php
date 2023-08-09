<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstallationRequest extends FormRequest
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
            'description' => 'required',
            'area_id' => 'required',
            'client_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo es requerido',
            'description.required' => 'Este campo es requerido',
            'area_id.required' => 'Este campo es requerido',
            'client_id.required' => 'Este campo es requerido',
        ];
    }
}
