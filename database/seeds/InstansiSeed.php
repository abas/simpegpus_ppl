<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InstansiSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Carbon $carbon)
    {
        for ($i=0; $i < 10; $i++) { 
            DB::table('instansis')->insert([
              'nama_instansi' => str_random(5),
              'created_at'    => $carbon->now()->toDateString(),
              'updated_at'    => $carbon->now()->toDateString(),
            ]);
        }
    }
}
