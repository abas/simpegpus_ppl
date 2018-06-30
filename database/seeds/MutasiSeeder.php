<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Carbon\Carbon;

class MutasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker,Carbon $carbon)
    {
        DB::table('mutasis')->insert([
            'pegawai_id'    => 7,
            'status_mutasi' => str_random(3),
            'instansi_id'   => 3,
            'created_at'    => $carbon->now()->toDateString(),
            'updated_at'    => $carbon->now()->toDateString(),
        ]);
    }
}
