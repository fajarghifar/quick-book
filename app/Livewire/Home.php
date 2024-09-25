<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;
use App\Models\Employee;

class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
            'employees' => Employee::all(),
            'services' => Service::all(),
        ]);
    }
}
