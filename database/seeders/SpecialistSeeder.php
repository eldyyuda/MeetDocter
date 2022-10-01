<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterData\Specialist;

class SpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialist =[
            [
                'name' => 'Dermatology',
                'price' => '250000',
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Dentist',
                'price' => '200000',
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Endodontics',
                'price' => '100000' ,
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')           
            ],
            [
                'name' => 'General Dentistry',
                'price' => '150000',
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Oral and Maxillofacial Surgery',
                'price' => '80000',
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Orthodontics',
                'price' => '750000',
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Pediatric Dentistry',
                'price'=> '180000',
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Periodontics',
                'price' => '2000000',
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Prosthodontics',
                'price' => '1900000',
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        Specialist::insert($specialist);
    }
}
