<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\Auth\LoginRequest;
use App\Models\Person;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Exception;

class AuthController extends Controller {


    /**
     * Faz o login do usuário
     *
     * @param  LoginRequest  $request
     *
     * @author Luiz Gustavo
     * @since  20/04/2023
     * @return JsonResponse
     */
    public function loginUser(LoginRequest $request): JsonResponse {
        try {
            $credentials = $request->validated();
            $query       = User::query();
            $remember    = $credentials['remember_password'] ?? false;

            $query = $query
                ->where('email', '=', $credentials['email'])
                ->where('type', '=', 'app');

            $credentialsValue = [
                'email'    => $credentials['email'],
                'password' => $credentials['password'],
                'type'     => 'app'
            ];

            $user = $query->first();

            if (!isset($user)) {
                throw ValidationException::withMessages([
                    "credetentials" => "Não existe um usuário com o e-mail informado."
                ]);
            }

            $isAuthenticated = Auth::attempt($credentialsValue, $remember);

            if (!$isAuthenticated) {
                throw ValidationException::withMessages([
                    "credetentials" => "Não existe um usuário com o e-mail informado."
                ]);
            }

            $loggedUser = Auth::user();

            $token = $loggedUser->createToken("token")->plainTextToken;

            $loggedUser = [
                ...$loggedUser->toArray(),
                'access_token' => $token
            ];

        } catch (Exception $exception) {
            return $this->error(message: $exception->getMessage());
        }

        return $this->success($loggedUser, "Usuário logado com sucesso");
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function register(Request $request): JsonResponse {
        $data = $request->all();

        $validator = Validator::make($data, [
            'user'                   => ['required', 'array'],
            'user.username'          => ['required', 'string', 'max:255'],
            'user.email'             => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->where('type', 'app')],
            'user.password'          => ['required', 'confirmed', Rules\Password::defaults()],

            'person'                 => ['required', 'array'],
            'person.name'            => ['required', 'string', 'max:255'],
            'person.document_number' => ['required', 'string', 'min:11', 'max:11'],
        ]);

        if($validator->fails()){
            return $this->error([], $validator->messages(), 200);
        }

        try {

            /* @var Person $person */
            $person = Person::create([
                'name'            => $data['person']['name'],
                'document_number' => $data['person']['document_number'],
                'type'            => 'app'
            ]);

            /* @var User $user */
            $user = User::create([
                'username'  => $data['user']['username'],
                'email'     => $data['user']['email'],
                'password'  => Hash::make($data['user']['password']),
                'type'      => 'app',
                'person_id' => $person->id
            ]);

            return $this->success($user, 'Usuário criado com sucesso!');
        } catch (Exception $exception) {
            return $this->error([], $exception->getMessage());
        }
    }

}
