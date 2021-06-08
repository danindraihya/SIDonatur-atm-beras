<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(JenisDonaturSeeder::class);
        $this->call(DonaturSeeder::class);
        $this->call(DonasiUangSeeder::class);
        $this->call(DonasiBerasSeeder::class);
    }
}
