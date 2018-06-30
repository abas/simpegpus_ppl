<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(InstansiSeed::class);
        // $this->call(AbsenSeeder::class);
        $this->call(MutasiSeeder::class);
    }
}
