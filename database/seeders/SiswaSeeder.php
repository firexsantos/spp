<?php

namespace Database\Seeders;

use App\Models\Admin\MasterData\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
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
                'nisn' => '123456',
                'nis' => '123456',
                'nama' => 'Julian Antara',
                'id_kelas' => 1,
                'alamat' => 'Jl. Kamboja',
                'no_telp' => '081252127451',
                'id_spp' => 1,
                'password' => bcrypt('123456')
            ],
            [
                'nisn' => '123457',
                'nis' => '123457',
                'nama' => 'Rosa Linda',
                'id_kelas' => 1,
                'alamat' => 'Jl. Cempaka',
                'no_telp' => '081252127444',
                'id_spp' => 1,
                'password' => bcrypt('123456')
            ]
        ];

        foreach ($data as $item) {
            Siswa::create($item);
        }
    }
}
