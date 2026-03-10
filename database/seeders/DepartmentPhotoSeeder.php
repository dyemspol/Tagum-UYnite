<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        $update = Department::where('id', 2)->first();
        $update->update([
            'department_photo' => 'https://res.cloudinary.com/deklle0es/image/upload/v1773059579/CENRO_qrqp7j.png',
        ]);

        $update = Department::where('id', 3)->first();
        $update->update([
            'department_photo' => 'https://res.cloudinary.com/deklle0es/image/upload/v1773059523/CDRRMO_r9avih.png',
        ]);

        $update = Department::where('id', 4)->first();
        $update->update([
            'department_photo' => 'https://res.cloudinary.com/deklle0es/image/upload/v1773059505/general_services_dibw14.png',
        ]);

        $update = Department::where('id', 5)->first();
        $update->update([
            'department_photo' => 'https://res.cloudinary.com/deklle0es/image/upload/v1773059470/public_safety_iqfuy1.png',
        ]);

        $update = Department::where('id', 6)->first();
        $update->update([
            'department_photo' => 'https://res.cloudinary.com/deklle0es/image/upload/v1772679661/reports/post_media/ij8bdtktck5zyup4lhch.png',
        ]);

        $update = Department::where('id', 7)->first();
        $update->update([
            'department_photo' => 'https://res.cloudinary.com/deklle0es/image/upload/v1772679661/reports/post_media/ij8bdtktck5zyup4lhch.png',
        ]);
    }
}
