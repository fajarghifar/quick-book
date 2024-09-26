<?php

use Carbon\Carbon;
use App\Livewire\Home;
use App\Models\Service;
use App\Models\Employee;
use App\Livewire\EmployeeShow;
use App\Booking\ScheduleAvailability;
use Illuminate\Support\Facades\Route;

Carbon::setTestNow(now()->setTimeFromTimeString('10:00'));

Route::get('/', Home::class)->name('home');
Route::get('/employees/{employee:slug}', EmployeeShow::class)->name('employees.show');

Route::get('/periods', function () {
    $employee = Employee::find(1);
    $service = Service::find(5);
    $availability = (new ScheduleAvailability($employee, $service))
        ->forPeriod(now()->startOfDay(), now()->endOfDay());


    dd($availability);
});
