<?php

namespace Database\Seeders;

use App\Models\Admin\MasterData\Kelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
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
                'nama_kelas' => '10RPL',
                'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak'
            ],
            [
                'nama_kelas' => '10TKJ',
                'kompetensi_keahlian' => 'Teknik Komputer Jaringan'
            ],
            [
                'nama_kelas' => '10DKV',
                'kompetensi_keahlian' => 'Desain Komunikasi Visual'
            ]
        ];

        foreach ($data as $item) {
            Kelas::create($item);
        }
    }
}
