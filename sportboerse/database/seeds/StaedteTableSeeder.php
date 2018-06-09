<?php

use Illuminate\Database\Seeder;

class StaedteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staedte')->insert([
            'stadtName' => 'Wien 1.Bezirk',
            'land_FK' => '1',
        ]);

        DB::table('staedte')->insert([
            'stadtName' => 'Wien 2.Bezirk',
            'land_FK' => '1',
        ]);

        DB::table('staedte')->insert([
            'stadtName' => 'Wien 3.Bezirk',
            'land_FK' => '1',
        ]);
    }
}
