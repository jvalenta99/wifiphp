<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(6),
            'vorname' => str_random(6),
            'email' => strtolower(str_random(6)).'@gmail.com',
            'password' => bcrypt('test@123')
        ]);

        DB::table('users')->insert([
            'name' => 'user1',
            'vorname' => str_random(6),
            'email' => 'user1@gmail.com',
            'password' => bcrypt('test@123')
        ]);

        DB::table('users')->insert([
            'name' => 'user2',
            'vorname' => str_random(6),
            'email' => 'user2@gmail.com',
            'password' => bcrypt('test@123')
        ]);


    }
}
