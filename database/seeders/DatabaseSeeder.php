<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\Role;
use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            ActivitySeeder::class,
        ]);

        User::factory()->admin()->create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
        ]);

        $company = Company::factory()->create();

        User::factory()->companyOwner()->create([
            'name' => 'Owner',
            'email' => 'owner@email.com',
            'company_id' => $company->id,
        ]);

        User::factory()->guide()->create([
            'name' => 'Guide',
            'email' => 'guide@email.com',
            'company_id' => $company->id,
        ]);
    }
}
