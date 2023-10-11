<?php

namespace App\Livewire;

use Livewire\Component;

class Test extends Component {

    public $isToggled = false;

    public function togglee() {
        $this->isToggled = !$this->isToggled;
    }

    public function render()
    {
        return view('livewire.test');
    }
}
