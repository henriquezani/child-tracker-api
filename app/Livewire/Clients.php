<?php

namespace App\Livewire;

use App\Models\Customer;
use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Clients extends Component {

    public bool $isNewClient = false;

    public string $searchValue;

    public array $people = [];

    public bool $haveSameClient = false;


    public function getClients() {
        $user      = Auth::user();
        $company   = $user->person->company;
        $customers = Customer::where('company_id', '=', $company->id)->get();
        $usersData = [];

        foreach ($customers as $customer) {
            $usersData[] = [
                'person' => $customer->person->toArray()
            ];
        }

        return $usersData;
    }

    public function search() {
        if (empty($this->searchValue)) {
            $this->people = [];
            return;
        }

        $people = Person::query()
            ->where('type', '=', 'app')
            ->where(function ($query) {
                $query->orWhere('document_number', '=', $this->searchValue)
                    ->orWhere("name", 'ILIKE', '%'.$this->searchValue.'%')
                    ->orWhere("phone", 'ILIKE', '%'.$this->searchValue.'%');
            })->get();

        if (empty($people)){
            $this->userName = 'Client not found';
            return;
        }

        $this->people = $people->toArray();
    }

    public function createCustomer(string $personId): void {
        /* @var User $user */
        $user    = Auth::user();
        $company = $user->person->company;

        $doesHaveTheSameClient = Customer::query()->where('company_id', '=', $company->id)
            ->where('person_id', '=', $personId)->get();

        if(!empty($doesHaveTheSameClient)) {
            $this->haveSameClient = true;
            return;
        }

         Customer::create([
            'company_id' => $company->id,
            'person_id'  => $personId
        ]);
    }

    public function goBack() {
        $this->isNewClient = !$this->isNewClient;

        if ($this->isNewClient) {
            $this->searchValue    = '';
            $this->people         = [];
            $this->haveSameClient = false;
        }

    }

    public function render() {
        return view('livewire.clients', [
            'clients'          => $this->getClients(),
        ]);
    }
}
