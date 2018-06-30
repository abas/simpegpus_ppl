<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Carbon\Carbon;

class PegawaiSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run(Faker $faker,Carbon $carbon)
  {
    for ($i=0; $i < 5; $i++) { 
      DB::table('pegawais')->insert([
        'nama'          => $faker->name,
        'no_ktp'        => $faker->randomNumber,
        'gaji'          => $faker->randomNumber,
        'status_pegawai'=> $faker->numberBetween(0,2),
        'created_at'    => $carbon->now()->toDateString(),
        'updated_at'    => $carbon->now()->toDateString(),
      ]);
    }
  }
}
