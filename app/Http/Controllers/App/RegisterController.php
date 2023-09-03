<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Exception;

class RegisterController extends Controller {

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): JsonResponse {
        $request->validate([
            'user'                   => ['required', 'array'],
            'user.username'          => ['required', 'string', 'max:255'],
            'user.email'             => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'user.password'          => ['required', 'confirmed', Rules\Password::defaults()],

            'people'                 => ['required', 'array'],
            'person.name'            => ['required', 'string', 'max:255'],
            'person.document_number' => ['required', 'string', 'min:11', 'max:11'],
        ]);


        try {

            /* @var Person $person */
            $person = Person::create([
                'name'            => 'Empresa Henrique',
                'document_number' => '51149334852',
                'type'            => 'dash'
            ]);

            /* @var User $user */
            $user = User::create([
                'username'  => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'type'      => 'dash',
                'person_id' => $person->id
            ]);

            return $this->success([], 'Usuário criado com sucesso!');
        } catch (Exception $exception) {
            return $this->error([], $exception->getMessage());
        }


//        event(new Registered($user));
//
//        Auth::login($user);
//
//        return redirect(RouteServiceProvider::HOME);
    }
}
