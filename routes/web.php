<?php

use App\Livewire\Home;
use App\Livewire\EmployeeShow;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class)->name('home');
Route::get('/employees/{employee:slug}', EmployeeShow::class)->name('employees.show');
