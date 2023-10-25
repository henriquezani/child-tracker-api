<?php

namespace App\Livewire;


use App\Models\City;
use App\Models\State;
use Livewire\Component;
use App\Models\Company;
use App\Models\Address;


class CompanyRegister extends Component
{
    // nome da empresa
    public $name;

    // fancy name
    public $fancy_name;

    // cnpj da empresa
    public $document_number;

    //info do endereço
    public $address;
    public $city;
    public $cities=[];
    public $states;
    public $street;
    public $zipcode;
    public $neighborhood;
    public $state;
    public $number;
    public $uf;



    protected $rules = [
        'name' => 'required|min:1',
        'fancy_name' => 'required|min:1',
        'document_number' => 'required|min:14|max:14',
        'street' => 'required',
        'neighborhood' => 'required',
        'zipcode' => 'required|min:8|max:8',
        'number'=> 'required|max:4'
    ];


    public function mount(){
        $this-> states = State::all();
        //orderBy('name')->get();
    }
    public function updatedState(){
        $this->cities = City::where('state_id','=',$this->state)->get();
        $this->uf= State::where('id', '=',$this->state)->pluck('uf');

    }

    public function render()
    {
        return view('livewire.company-register');

    }

    public function save(){

        $this->validate();
        //cadastrando address
       $this->address = Address::create([
            'zipcode' => $this->zipcode,
            'uf' => $this->uf[0],
            'street' => $this->street,
            'number' => $this->number,
            'complement' => null,
            'neighborhood' => $this->neighborhood,
            'state_id' => $this->state,
            'city_id' =>$this-> city
       ]);

       Company::create([
           'name'=> strtolower($this->name),
           'fancy_name'=> strtolower($this->fancy_name),
           'document_number'=> $this->document_number,
           'address_id' => $this->address['id']

       ]);

        $this->redirect('/user-register');


    }

}

