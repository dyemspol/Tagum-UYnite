<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['department_name' => 'Engineering Office', 'category' => 'Roads, Streetlights, Drainage'],
            ['department_name' => 'CENRO', 'category' => 'Garbage, Illegal Dumping'],
            ['department_name' => 'CDRRMO', 'category' => 'Floods, Hazard Issues'],
            ['department_name' => 'General Services Office', 'category' => 'Maintenance, Public Facilities'],
            ['department_name' => 'Public Safety / Traffic Office', 'category' => 'Traffic Concerns'],
            ['department_name' => 'Health Office', 'category' => 'Health/Environment Sanitary Issues'],
            ['department_name' => 'Social Welfare', 'category' => 'Welfare/Community Issues'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
