<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;

class AppointmentShow extends Component
{
    public Appointment $appointment;

    public function cancelAppointment()
    {
        $this->appointment->update([
            'cancelled_at' => now()
        ]);
    }

    public function render()
    {
        return view('livewire.appointment-show');
    }
}
