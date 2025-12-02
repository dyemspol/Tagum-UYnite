<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barangays = [
            'APOKON',
            'BINCUNGAN',
            'BUSAON',
            'CANOCOTAN',
            'CUAMBOGAN',
            'LA FILIPINA',
            'LIBOGANON',
            'MADAUM',
            'MAGDUM',
            'MAGUGPO EAST',
            'MAGUGPO NORTH',
            'MAGUGPO POBLACION',
            'MAGUGPO SOUTH',
            'MAGUGPO WEST',
            'MANKILAM',
            'NEW BALAMBAN',
            'NUEVA FUERZA',
            'PAGSABANGAN',
            'PANDAPAN',
            'SAN AGUSTIN',
            'SAN ISIDRO',
            'SAN MIGUEL (Camp 4)',
            'VISAYAN VILLAGE'
        ];
        
        $data = [];
        $now = Carbon::now();
        
        foreach ($barangays as $barangay) {
            $data[] = [
                'barangay_name' => $barangay,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        
        DB::table('barangays')->insert($data);
        
        $this->command->info('✅ ' . count($barangays) . ' barangays seeded successfully!');
    }
}
