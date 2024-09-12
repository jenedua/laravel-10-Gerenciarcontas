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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user');

        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.($userId ? $userId->id : null),
            'password' => 'required|min:6',
            'cpf' => 'required|unique:users,cpf,'.($userId ? $userId->id : null),
        ];
    }
    public function messages():array
    {
        return [
            'name.required' => 'Campo nome é obrigatório!',
            'email.required' => 'Campo e-mail é obrigatório!',
            'email.email' => 'Necessário enviar um e´-mail válido!',
            'email.unique' => 'O e-mail já est cadastrado!',
            
            'password.required' => 'Campo senha é obrigatorio!',
            'password.min' => 'Senha com no minimo :min caracteres!',

            'cpf.required' => 'Campo cpf é obrigatório!',
            'cpf.unique' => 'O cpf já esta cadastrado!',

        ];

    }
}
