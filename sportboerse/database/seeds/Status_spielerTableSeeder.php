<?php

use Illuminate\Database\Seeder;

class Status_spielerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_spieler')->insert([
            'statusSpName' => 'spielt mit'
        ]);

        DB::table('status_spieler')->insert([
            'statusSpName' => 'in Reserve'
        ]);

        DB::table('status_spieler')->insert([
            'statusSpName' => 'abgelehnt'
        ]);

        DB::table('status_spieler')->insert([
            'statusSpName' => 'angesucht'
        ]);


    }
}
