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

   // public $data = [];

    // nome da empresa
    #[Rule('required|String|min1')]
    public $name = "";

    // fancy name
    #[Rule('required|String|min1')]
    public $fancy_name = "";

    // cnpj da empresa
    #[Rule('required|numeric|min14|max14')]
    public $document_number = "";

    // nome do user
    #[Rule('required|String|min1')]
    public $username = "";

    // password
    #[Rule('required|String|min7|regex:/[@$!%*#?&]/|regex:/[0-9]/|regex:/[A-Z]/|regex:/[a-z]/')]
    public $password = "";

    public function save() {
       try {
           $this->validate();

           $address = Address::create();

            /* @var Company $company */
            $company = Company::create([
                'name'            => $this->name,
                'document_number' => $this->document_number,
                'fancy_name'      => $this->fancy_name,
            ]);

            /* @var Person $person */
            $user = User::create([
                'username'  => $request->username,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'type'      => 'dash',
                'person_id' => $person->id
            ]);

           event(new Registered($user));

           Auth::login($user);

           $this->success([], 'Usuário criado com sucesso!');


        } catch (Exception $exception) {
           return $exception->getMessage();//
        }
        return redirect(RouteServiceProvider::HOME);
    }

    public function render() {
        return view('livewire.register');
    }
}
