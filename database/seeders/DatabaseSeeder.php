<?php

namespace Database\Seeders;

use App\Models\Service;
use App\Models\Employee;
use App\Models\Schedule;
use App\Models\EmployeeService;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $employees = Employee::factory(5)->create();

        $services = [
            ['title' => 'Haircut', 'slug' => 'haircut', 'duration' => 30, 'price' => 5000],
            ['title' => 'Hair and Beard', 'slug' => 'hair-and-beard', 'duration' => 45, 'price' => 8000],
            ['title' => 'Beard Trim', 'slug' => 'beard-trim', 'duration' => 20, 'price' => 3000],
            ['title' => 'Hair Coloring', 'slug' => 'hair-coloring', 'duration' => 90, 'price' => 12000],
            ['title' => 'Hair Spa', 'slug' => 'hair-spa', 'duration' => 60, 'price' => 10000],
        ];

        $createdServices = [];
        foreach ($services as $serviceData) {
            $createdServices[] = Service::create($serviceData);
        }

        foreach ($employees as $employee) {
            $randomServices = $this->getRandomServices($createdServices, rand(1, 3));

            foreach ($randomServices as $service) {
                EmployeeService::create([
                    'employee_id' => $employee->id,
                    'service_id' => $service->id,
                ]);
            }

            Schedule::factory()->create([
                'employee_id' => $employee->id,
            ]);
        }
    }

    private function getRandomServices(array $services, int $count): array
    {
        return collect($services)->random($count)->all();
    }
}
