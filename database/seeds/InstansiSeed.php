<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Carbon\Carbon;

class InstansiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker,Carbon $carbon)
    {
        for ($i=0; $i < 5; $i++) { 
            DB::table('instansis')->insert([
              'nama_instansi' => $faker->name,
              'created_at'    => $carbon->now()->toDateString(),
              'updated_at'    => $carbon->now()->toDateString(),
            ]);
        }
    }
}