<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterData\TypeUser;

class TypeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typeUser= [
            [
                'name' => 'Admin',
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Doctor',
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'name'=>'patient',
                'created_at' =>date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];
        TypeUser::insert($typeUser);
    }
}
