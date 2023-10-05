<?php

namespace App\Livewire;

use App\Models\Address;
use App\Models\Company;
use App\Models\Person;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Exception;

class Register extends Component {

    public $data = [];

    // nome da empresa
    public $name = "";

    // cnpj da empresa
    public $document_number = "";

    // nome do user
    public $username = "";

    // password
    public $password = "";

    public function save() {
//        try {
//
//            $address = Address::create();
//
//            /* @var Person $person */
//            $company = Company::create([
//                'name'            => $this->name,
//                'document_number' => '22222222222',
//                'type'            => 'dash'
//            ]);
//
//            /* @var User $user */
//            $user = User::create([
//                'username'  => $request->name,
//                'email'     => $request->email,
//                'password'  => Hash::make($request->password),
//                'type'      => 'dash',
//                'person_id' => $person->id
//            ]);
//
//            event(new Registered($user));
//
//            Auth::login($user);
//
//            $this->success([], 'Usuário criado com sucesso!');
//
//            return redirect(RouteServiceProvider::HOME);
//        } catch (Exception $exception) {
//            $this->error([], $exception->getMessage());
//            return redirect(RouteServiceProvider::HOME);
//        }
    }

    public function render() {
        return view('livewire.register');
    }
}
