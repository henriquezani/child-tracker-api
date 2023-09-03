<?php

namespace App\Util\Traits;

use Illuminate\Http\JsonResponse;

trait HasResponse {

    /**
     * Retorno de sucesso
     */
    public function success(mixed $data = null, string $message = '', array $headers = []): JsonResponse {
        $return = [
            'data'    => $data,
            'message' => $message,
            'success' => true,
        ];

        return new JsonResponse($return, 200, $headers, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Retorno de erro
     */
    public function error(mixed $data = null, string $message = '', int $status = 400, array $headers = []): JsonResponse {
        $return = [
            'errors'  => $data,
            'message' => $message,
            'success' => false,
        ];

        return new JsonResponse($return, $status, $headers, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

}
