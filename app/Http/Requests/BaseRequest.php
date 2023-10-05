<?php

namespace App\Http\Requests;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest {

    /**
     * Determina se o usuário está autorizado a fazer a requisição.
     *
     * @author Lucas Zorzi
     * @since  24/03/2023
     * @return bool
     */
    public function authorize(): bool {
        return (bool) $this->user()?->id;
    }

    /**
     * Handle a failed authorization attempt.
     *
     * @author Lucas Zorzi
     * @since  24/03/2023
     * @return void
     * @throws AuthorizationException
     */
    protected function failedAuthorization(): void {
        throw new AuthorizationException('Nenhum usuário autorizado foi encontrado.');
    }

}
