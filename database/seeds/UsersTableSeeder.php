<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            'name' => 'Administrator',
            'email' => 'admin@nounext.com',
            'password' => bcrypt('W@llet2018'),
            'confirmed' => true,
            'token' => Str::random(64),
            'deleted' => false
        ]);
    }
}