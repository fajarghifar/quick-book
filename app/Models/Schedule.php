<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    protected $casts = [
        'starts_at' => 'date',
        'ends_at' => 'date',
    ];

    public function getWorkingHoursForDate(Carbon $date)
    {
        $hours = array_filter([
            $this->{strtolower($date->format('l')) . '_starts_at'},
            $this->{strtolower($date->format('l')) . '_ends_at'},
        ]);
        return !empty($hours) ? $hours : null;
    }
}
