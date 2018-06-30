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
        'nama'          => str_random(10),
        'no_ktp'        => str_random(12),
        'gaji'          => rand(10)*100000,
        'status_pegawai'=> str_random(3),
        'created_at'    => $carbon->now()->toDateString(),
        'updated_at'    => $carbon->now()->toDateString(),
      ]);
    }
  }
}
