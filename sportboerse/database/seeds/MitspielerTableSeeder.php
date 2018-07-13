<?php

use Illuminate\Database\Seeder;

class MitspielerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mitspieler')->insert([
            'benut_FK' => '6',
            'veran_FK' => '1',
            'status_FK' => '1',
            'bewertung' => '4',
        ]);
        
        DB::table('mitspieler')->insert([
            'benut_FK' => '5',
            'veran_FK' => '1',
            'status_FK' => '1',
            'bewertung' => '4',
        ]);

        DB::table('mitspieler')->insert([
            'benut_FK' => '4',
            'veran_FK' => '1',
            'status_FK' => '1',
            'bewertung' => '4',
        ]);

        DB::table('mitspieler')->insert([
            'benut_FK' => '3',
            'veran_FK' => '1',
            'status_FK' => '1',
            'bewertung' => '4',
        ]);

        DB::table('mitspieler')->insert([
            'benut_FK' => '2',
            'veran_FK' => '1',
            'status_FK' => '1',
            'bewertung' => '4',
        ]);

        DB::table('mitspieler')->insert([
            'benut_FK' => '1',
            'veran_FK' => '1',
            'status_FK' => '1',
            'bewertung' => '4',
        ]);

        //-----------------------------------------

        DB::table('mitspieler')->insert([
            'benut_FK' => '6',
            'veran_FK' => '2',
            'status_FK' => '1',
            'bewertung' => '4',
        ]);
        
        DB::table('mitspieler')->insert([
            'benut_FK' => '5',
            'veran_FK' => '2',
            'status_FK' => '1',
            'bewertung' => '4',
        ]);

        DB::table('mitspieler')->insert([
            'benut_FK' => '4',
            'veran_FK' => '2',
            'status_FK' => '1',
            'bewertung' => '4',
        ]);

        DB::table('mitspieler')->insert([
            'benut_FK' => '3',
            'veran_FK' => '3',
            'status_FK' => '3',
            'bewertung' => '4',
        ]);

        DB::table('mitspieler')->insert([
            'benut_FK' => '2',
            'veran_FK' => '3',
            'status_FK' => '1',
            'bewertung' => '4',
        ]);

        DB::table('mitspieler')->insert([
            'benut_FK' => '1',
            'veran_FK' => '3',
            'status_FK' => '1',
            'bewertung' => '4',
        ]);

        DB::table('mitspieler')->insert([
            'benut_FK' => '6',
            'veran_FK' => '4',
            'status_FK' => '1',
            'bewertung' => '4',
        ]);
        
        DB::table('mitspieler')->insert([
            'benut_FK' => '5',
            'veran_FK' => '4',
            'status_FK' => '1',
            'bewertung' => '4',
        ]);

        DB::table('mitspieler')->insert([
            'benut_FK' => '4',
            'veran_FK' => '4',
            'status_FK' => '1',
            'bewertung' => '4',
        ]);
    }
}
