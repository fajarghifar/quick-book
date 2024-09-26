<?php

use Carbon\Carbon;
use App\Livewire\Home;
use App\Models\Service;
use App\Models\Employee;
use App\Booking\SlotGenerator;
use App\Livewire\EmployeeShow;
use App\Booking\ScheduleAvailability;
use Illuminate\Support\Facades\Route;
use App\Booking\ServiceSlotAvailability;

Carbon::setTestNow(now()->setTimeFromTimeString('10:00'));

Route::get('/', Home::class)->name('home');
Route::get('/employees/{employee:slug}', EmployeeShow::class)->name('employees.show');

Route::get('/periods', function () {
    $employees = Employee::get();
    $service = Service::find(1);

    $availability = (new ServiceSlotAvailability($employees, $service))
        ->forPeriod(now()->startOfDay(), now()->addDay()->endOfDay());

    dd($availability);
});
