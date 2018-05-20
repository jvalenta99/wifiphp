<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SportartsTableSeeder::class);
        $this->call(LaenderTableSeeder::class);
        $this->call(MitspielerTableSeeder::class);
        $this->call(NachrichtenTableSeeder::class);
        $this->call(SportveranstaltungenTableSeeder::class);
        $this->call(StaedteTableSeeder::class);
        $this->call(Status_spielerTableSeeder::class);
                
    }
}
