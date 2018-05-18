<?php

use Illuminate\Database\Seeder;

class SportartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('sportarts')->insert([
            'sportartsName' => 'Fußball',
        ]);
        DB::table('sportarts')->insert([
            'sportartsName' => 'Schach',
        ]);
        DB::table('sportarts')->insert([
            'sportartsName' => 'Basketball',
        ]);


    }
}
