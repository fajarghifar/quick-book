<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ScheduleFactory extends Factory
{
    protected $model = \App\Models\Schedule::class;

    public function definition(): array
    {
        $workingHoursStart = '09:00:00';
        $workingHoursEnd = '17:00:00';

        return [
            'employee_id' => Employee::factory(),
            'starts_at' => Carbon::now()->startOfWeek(),
            'ends_at' => Carbon::now()->endOfWeek(),
            'monday_starts_at' => $workingHoursStart,
            'monday_ends_at' => $workingHoursEnd,
            'tuesday_starts_at' => $workingHoursStart,
            'tuesday_ends_at' => $workingHoursEnd,
            'wednesday_starts_at' => $workingHoursStart,
            'wednesday_ends_at' => $workingHoursEnd,
            'thursday_starts_at' => $workingHoursStart,
            'thursday_ends_at' => $workingHoursEnd,
            'friday_starts_at' => $workingHoursStart,
            'friday_ends_at' => $workingHoursEnd,
            'saturday_starts_at' => '10:00:00', // Waktu mulai untuk Sabtu
            'saturday_ends_at' => '14:00:00', // Waktu akhir untuk Sabtu
            'sunday_starts_at' => '10:00:00', // Waktu mulai untuk Minggu
            'sunday_ends_at' => '14:00:00', // Waktu akhir untuk Minggu
        ];
    }
}
