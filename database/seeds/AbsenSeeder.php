<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AbsenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Carbon $carbon)
    {
        for ($i=1; $i < 16; $i++) { 
            DB::table('absens')->insert([
                'pegawai_id'=>$i,
                'created_at'=>$carbon->now()->toDateString(),
                'updated_at'=>$carbon->now()->toDateString()
            ]);
        }
    }
}
