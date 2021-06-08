<?php

namespace Database\Seeders;

use App\Models\DonasiUang;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DonasiUangSeeder extends Seeder
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
                    DonasiUang::create([
                        'donatur_id' => $donaturId,
                        'nominal' => rand(100000, 500000),
                        'created_at' => Carbon::today()->subDay($tanggal),
                    ]);
                }
            }
        }
    }
}
