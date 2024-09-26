<?php

namespace App\Booking;

use Carbon\Carbon;
use App\Models\Service;
use App\Models\Employee;
use Carbon\CarbonPeriod;
use Spatie\Period\Period;
use Spatie\Period\Precision;
use App\Models\ScheduleExclusion;
use Spatie\Period\PeriodCollection;

class ScheduleAvailability
{
    protected PeriodCollection $periods;

    public function __construct(protected Employee $employee, protected Service $service)
    {
        $this->periods = new PeriodCollection();
    }

    public function forPeriod(Carbon $startsAt, Carbon $endsAt)
    {
        collect(CarbonPeriod::create($startsAt, $endsAt)->days())
            ->each(function (Carbon $date) {
                $this->addAvailabilityFromSchedule($date);
                $this->employee->scheduleExclusions->each(function (ScheduleExclusion $scheduleExclusion) {
                    $this->subtractScheduleExclusion($scheduleExclusion);
                });

                $this->excludeTimePassedToday();
            });


        return $this->periods;
    }

    protected function excludeTimePassedToday()
    {
        $this->periods = $this->periods->subtract(
            Period::make(
                now()->startOfDay(),
                now()->endOfHour(),
                Precision::MINUTE()
            )
        );
    }

    protected function subtractScheduleExclusion(ScheduleExclusion $scheduleExclusion)
    {
        $this->periods = $this->periods->subtract(
            Period::make(
                $scheduleExclusion->starts_at,
                $scheduleExclusion->ends_at,
                Precision::MINUTE()
            )
        );
    }

    protected function addAvailabilityFromSchedule(Carbon $date)
    {
        if (!$schedule = $this->employee->schedules->where('starts_at', '<=', $date)->where('ends_at', '>=', $date)->first()) {
            return;
        }

        if (![$startsAt, $endsAt] = $schedule->getWorkingHoursForDate($date)) {
            return;
        }

        $this->periods = $this->periods->add(
            Period::make(
                $date->copy()->setTimeFromTimeString($startsAt),
                $date->copy()->setTimeFromTimeString($endsAt)->subMinutes($this->service->duration),
                Precision::MINUTE()
            )
        );
    }
}
