<?php

use Illuminate\Database\Seeder;

class LaenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('laender')->insert([
            'landName' => 'Österreich',
            'landKurz' => 'AUT',
        ]);
        DB::table('laender')->insert([
            'landName' => 'Deutschland',
            'landKurz' => 'DEU',
        ]);
        DB::table('laender')->insert([
            'landName' => 'Schweiz',
            'landKurz' => 'CH',
        ]);
    }
}
