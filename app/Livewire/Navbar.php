<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Navbar extends Component {

    public function getClasses() {
        Route::currentRouteName();
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
