<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HealthOfficeStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = \App\Models\Department::where('department_name', 'Health Office')->first();

        if ($department) {
            \App\Models\User::updateOrCreate(
                ['email' => 'health@tagum.gov'],
                [
                    'first_name' => 'Health',
                    'last_name' => 'Staff',
                    'username' => 'healthstaff',
                    'password' => 'health123',
                    'role' => 'employee',
                    'department_id' => $department->id,
                    'is_verified' => true,
                ]
            );
        }
    }
}
