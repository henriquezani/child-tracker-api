<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Exception;

class RegisterController extends Controller {

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
            'user.email'             => ['required', 'string', 'email', 'max:255'],
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
