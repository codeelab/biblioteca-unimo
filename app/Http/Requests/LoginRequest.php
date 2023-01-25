<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\EmailValidator;

class LoginRequest extends FormRequest
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
        $rules = [
            'email'         =>  ['required','email', new EmailValidator],
            'password' => 'required'
        ];
        return $rules;

    }

    public function messages()
    {
        return [
            'email.required'        =>  'Campo requerido.',
            'email.email'           =>  'El :attribute debe ser un correo válido.',
            'email.max'             =>  'El :attribute no puede ser mayor a :max caracteres.',
            'email.unique'          =>  'El :attribute ya fue utilizado.',

            'password.required'    =>  'Campo requerido.',

        ];
    }

    public function attributes()
    {
        return [
            'password'        =>  'Contraseña',
            'email'         =>  'Correo'
        ];
    }

}