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
            ['department_name' => 'Engineering Office', 'category' => 'roads, streetlights, drainage'],
            ['department_name' => 'CENRO', 'category' => 'garbage, illegal dumping'],
            ['department_name' => 'CDRRMO', 'category' => 'floods, hazard issues'],
            ['department_name' => 'General Services Office', 'category' => 'maintenance, public facilities'],
            ['department_name' => 'Public Safety / Traffic Office', 'category' => 'traffic concerns'],
            ['department_name' => 'Health Office', 'category' => 'health/environment sanitary issues'],
            ['department_name' => 'Social Welfare', 'category' => 'welfare/community issues'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
