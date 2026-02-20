<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Department;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $department = Department::first();
        User::create([
            'first_name' => 'Carlos',
            'last_name' => 'Employee',
            'username' => 'staffko',
            'email' => 'carlos@tagum.gov',
            'password' => 'staff123',
            'role' => 'employee',
            'date_of_birth' => null,
            'department_id' => $department ? $department->id : null,
            'barangay_id' => null,
            'address' => null,
            'is_verified' => true,
        ]);

        User::create([
            'first_name' => 'Carlos',
            'last_name' => 'Employee',
            'username' => 'adminko',
            'email' => 'admin@tagum.gov',
            'password' => 'admin123',
            'role' => 'superadmin',
            'date_of_birth' => null,
            'department_id' =>  null,
            'barangay_id' => null,
            'address' => null,
            'is_verified' => true,
        ]);

        User::create([
            'first_name' => 'Juan',
            'last_name' => 'Citizen',
            'username' => 'onen',
            'email' => 'juan@gmail.com',
            'password' => 'resident123',
            'role' => 'resident',
            'date_of_birth' => null,
            'barangay_id' => null,
            'address' => null,
            'is_verified' => false,
        ]);
    }
}
