<?php

namespace App\Http\Requests;

use App\Rules\EmailValidator;
use Illuminate\Support\Facades\Password;
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
        $rules = [
            'name'          =>  'required|alpha',
            'first_name'    =>  'required|alpha',
            'last_name'     =>  'required|alpha',
            'enrolment'     =>  'required|alpha_dash|unique:users,enrolment',
            'email'         =>  ['required','email','max:50','unique:users,email', new EmailValidator],
            'password' => ['required'],
        ];

        return $rules;

    }

    public function messages()
    {
        return [
            'name.required'         =>  'Campo requerido.',
            'name.alpha'            =>  'El :attribute debe contener caracteres alfabéticos.',

            'first_name.required'   =>  'Campo requerido.',
            'first_name.alpha'      =>  'El :attribute debe contener caracteres alfabéticos.',

            'last_name.required'    =>  'Campo requerido.',
            'last_name.alpha'       =>  'El :attribute debe contener caracteres alfabéticos.',

            'enrolment.required'    =>  'Campo requerido.',
            'enrolment.alpha_dash'  =>  'El :attribute debe contener caracteres alfanumericos.',
            'enrolment.unique'      =>  'Otro usuario con la :attribute (:input) ya fue registrado.',

            'email.required'        =>  'Campo requerido.',
            'email.email'           =>  'El :attribute debe ser un correo válido.',
            'email.max'             =>  'El :attribute no puede ser mayor a :max caracteres.',
            'email.unique'          =>  'El :attribute ya fue registrado.',

            'password.required'     => 'La contraseña es obligatoria.',
            'password.min'          => 'La contraseña debe tener al menos :min caracteres.',
            'password.mixed_case'   => 'La contraseña debe tener al menos una letra mayúscula y una minúscula.',
            'password.letters'      => 'La contraseña debe contener al menos una letra.',
            'password.numbers'      => 'La contraseña debe contener al menos un número.',
            'password.symbols'      => 'La contraseña debe contener al menos un símbolo.',
            'password.uncompromised' => 'La contraseña es comprometida, por favor elige otra.',
        ];
    }

    public function attributes()
    {
        return [
            'name'          =>  'Nombre',
            'first_name'    =>  'Apellido Paterno',
            'last_name'     =>  'Apellido Materno',
            'enrolment'     =>  'Matrícula',
            'email'         =>  'Correo',
            'password'      =>  'Contraseña'
        ];
    }

}