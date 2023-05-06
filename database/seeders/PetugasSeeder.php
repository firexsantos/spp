<?php

namespace Database\Seeders;

use App\Models\Admin\Petugas;
use Illuminate\Database\Seeder;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'nama_petugas' => 'Administrator',
                'level' => 'admin',
                'password' => bcrypt('123456')
            ],
            [
                'username' => 'petugas',
                'nama_petugas' => 'Petugas',
                'level' => 'petugas',
                'password' => bcrypt('123456')
            ]
        ];

        foreach ($data as $item) {
            Petugas::create($item);
        }
    }
}
