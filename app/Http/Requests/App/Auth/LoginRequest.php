<?php

namespace App\Http\Requests\App\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @author Luiz Gustavo
     * @since  17/04/2023
     * @return bool
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Retorna as regras de validações que se aplicam à requisição atual.
     *
     * @author Luiz Gustavo
     * @since  17/04/2023
     * @return array
     */
    public function rules(): array {
        return [
            'email'             => ['required', 'email', 'min:3', 'max:255'],
            'password'          => ['required', 'min:8'],
//            'owner'             => ['sometimes', 'nullable', 'string'],
            'remember_password' => ['sometimes', 'nullable', 'boolean'],
        ];
    }

    /**
     * Retorna os atributos personalizados para os erros do validador.
     *
     * @author Luiz Gustavo
     * @since  17/04/2023
     * @return array
     */
    public function attributes(): array {
        return [
            'email'             => 'email',
            'password'          => 'senha',
            'remember_password' => 'lembrar senha'
        ];
    }
}
