<?php

use Illuminate\Database\Seeder;

class Test2TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('test2s')->insert([
            'text1' => 'text1 bla bla',
            'unsInt' => '3',

            'datumCas' => '1964-04-21  07:10:00',
            ]);
          
            


    }
}
