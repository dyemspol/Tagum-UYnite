<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = \App\Models\Department::first(); // Assumes departments exist

        \App\Models\User::create([
            'first_name' => 'Carlos',
            'last_name' => 'Employee',
            'username' => 'carlos_eng',
            'email' => 'carlos@tagum.gov',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'employee',
            'department_id' => $department ? $department->id : null, 
            'barangay_id' => 1, // Assumes barangay 1 exists
        ]);
    }
}
