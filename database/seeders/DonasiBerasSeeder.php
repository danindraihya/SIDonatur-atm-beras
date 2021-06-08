<?php

namespace Database\Seeders;

use App\Models\DonasiBeras;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DonasiBerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($donaturId = 1; $donaturId <= 4; $donaturId++) {
            for ($tanggal = 0; $tanggal <= 30; $tanggal++) {
                for ($donasi = 1; $donasi <= 5; $donasi++) {
                    DonasiBeras::create([
                        'donatur_id' => $donaturId,
                        'jumlah' => rand(10, 100),
                        'created_at' => Carbon::today()->subDay($tanggal),
                    ]);
                }
            }
        }
    }
}
