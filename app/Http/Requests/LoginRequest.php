<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // o campo 'email' deve ser preenchido e conter um e-email válido
            'email'=> 'required|email',
            //o campo 'password' deve ser preenchido
            'password' =>'required',
        ];
    }

    public function messages()
    {
        return[
            //mensagem para quando o campo  'email' não for preenchido
            'email.required' => 'Campo e-mail é oborigatório',
            //mensagem para quando o campo 'email' não contiver um endereço de e-mail valido
            'email.email' => 'Necessario enviar e-mail valido',
            // mensagem para quando o campo 'password' não for preenchido
            'password.required' => 'Campo senha é obrigatorio'

        ];
    }
}
