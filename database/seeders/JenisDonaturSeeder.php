<?php

namespace Database\Seeders;

use App\Models\JenisDonatur;
use Illuminate\Database\Seeder;

class JenisDonaturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listJenisDonatur = [
            ['label' => 'Warga RW 16'],
            ['label' => 'Umum'],
            ['label' => 'Organisasi'],
            ['label' => 'Korporasi'],
        ];

        foreach ($listJenisDonatur as $jenisDonatur) {
            JenisDonatur::create($jenisDonatur);
        }
    }
}
