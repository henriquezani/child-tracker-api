<?php

namespace App\Livewire;

use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;




class Login extends Component
{
    public $email;
    public $password;

    public function render()
    {
        return view('livewire.login');
    }

    public function cadastro(){
        $this->redirect('/register');
    }

    public function test(Request $request)
    {

        // Must not already exist in the `email` column of `users` table
        $rules = array('email' => 'unique:users,email');
        
        $input['email'] = $this->email;

        $validator = Validator::make($input, $rules);

        if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){
            $request->session()->regenerate();

            return $this->redirect('/dashboard', navigate:true);

        } elseif (!$validator->fails()) {
            $this->addError('email','E-mail não encontrado no sistema');

        } else {
            $this->addError('password','A senha provida não corresponde ao email');
        }
        
    }


}
