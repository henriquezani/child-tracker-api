<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Clients extends Component {

    public bool $isNewClient = false;

    public function getClients() {
        $users     = User::all();
        $usersData = [];

        foreach ($users as $user) {
            $usersData[] = [
                'user'   => $user->toArray(),
                'person' => $user->person->toArray()
            ];
        }

        return $usersData;
    }

    public function toggleee() {
        $this->isNewClient = !$this->isNewClient;
    }

    public function goToClient() {
        $this->redirect(Client::class);
    }

    public function render() {
        return view('livewire.clients', [
            'clients'     => $this->getClients(),
//            'isNewClient' => false
        ]);
    }
}
