<?php

namespace App\Livewire;


use App\Models\Company;
use App\Models\Person;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;


class UserRegister extends Component
{


    public $username;
    public $password;
    public $password_confirmation;
    public $document_number;
    public $companies;
    public $company_id;
    public $address_id;
    public $email;
    public $person;


    protected $rules = [
        'username' => 'required|min:3',
        'document_number' => 'required|min:11|max:11',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'password_confirmation' => 'required|same:password'
    ];

    public function mount()
    {
        $this->companies = Company::all();
    }

    public function render()
    {
        return view('livewire.user-register');
    }

    public function save()
    {

//        $this->validate();

        $this->address_id = Company::where('id', '=', $this->company_id)->pluck('address_id');

        $this->person = Person::create([
            'name' => $this->username,
            'document_number' => $this->document_number,
            'phone' => null,
            'profile_picture' => null,
            'birthdate' => null,
            'type' => 'dash',
            'company_id' => $this->company_id,
            'address_id' => $this->address_id

        ]);

        $user = User::create([
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'type' => 'dash',
            'person_id' => $this->person['id']
        ]);

        Auth::login($user);
        redirect(RouteServiceProvider::HOME);

    }

}
