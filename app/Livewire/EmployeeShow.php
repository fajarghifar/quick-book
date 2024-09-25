<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Employee;

class EmployeeShow extends Component
{
    public Employee $employee;

    public function render()
    {
        return view('livewire.employee-show');
    }
}
