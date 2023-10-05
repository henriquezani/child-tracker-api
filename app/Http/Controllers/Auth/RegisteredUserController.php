<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Person;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller {

    /**
     * Display the registration view.
     */
    public function create(): View {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse {
//        $request->validate([
//            'user'              => ['required', 'array'],
//            'username'          => ['required', 'string', 'max:255'],
//            'email'             => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
//            'password'          => ['required', 'confirmed', Rules\Password::defaults()],
//
//            'people'                 => ['required', 'array'],
//            'person.name'            => ['required', 'string', 'max:255'],
//            'person.document_number' => ['required', 'string', 'min:11', 'max:11'],
//        ]);

        try {

            /* @var Person $person */
            $person = Person::create([
                'name'            => $request->name,
                'document_number' => '22222222222',
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

            event(new Registered($user));

            Auth::login($user);

            $this->success([], 'Usuário criado com sucesso!');

            return redirect(RouteServiceProvider::HOME);
        } catch (Exception $exception) {
            $this->error([], $exception->getMessage());
            return redirect(RouteServiceProvider::HOME);
        }

    }
}
