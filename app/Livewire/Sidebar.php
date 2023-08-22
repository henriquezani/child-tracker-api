<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class Sidebar extends Component {
    public function render(): View {
        return view('livewire.sidebar')->with([
            'items' => $this->getItems()
        ]);
    }

    public function getItems(): array {
        return [
            'safe_zone' => [
                'url'   => '/safe-zone',
                'label' => 'Zona Segura'
            ],
            'users' => [
                'url'      => '/users',
                'label'    => 'Usuários',
                'sub_item' => [
                    'create' => [
                        'url'   => '/user',
                        'label' => 'Criar'
                    ],
                    'edit' => [
                        'url'   => '/user',
                        'label' => 'Editar'
                    ]
                ]
            ]

        ];
    }
}
