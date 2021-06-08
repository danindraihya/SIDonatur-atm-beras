<?php

namespace Database\Seeders;

use App\Models\Donatur;
use Illuminate\Database\Seeder;

class DonaturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listDonatur = [
            [
                'jenis_donatur_id' => rand(1, 4),
                'nama' => 'Praditya Nafiis Muhammad',
                'alamat' => 'Bogor',
                'nomor_ponsel' => '082277771838',
            ],
            [
                'jenis_donatur_id' => rand(1, 4),
                'nama' => "Danindra Ihya' Maulalhaq",
                'alamat' => 'Sidoarjo',
                'nomor_ponsel' => '081931571433',
            ],
            [
                'jenis_donatur_id' => rand(1, 4),
                'nama' => 'Zazabillah Sekar Puranti',
                'alamat' => 'Lumajang',
                'nomor_ponsel' => '085234662074',
            ],
            [
                'jenis_donatur_id' => rand(1, 4),
                'nama' => 'Nadia Ayu Laksmidewi',
                'alamat' => 'Sidoarjo',
                'nomor_ponsel' => '082140640636',
            ],
        ];

        foreach ($listDonatur as $donatur) {
            Donatur::create($donatur);
        }
    }
}
