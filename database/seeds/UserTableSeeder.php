<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'role_id' 	=> '1',
        	'name'		=> 'Joshim',
        	'email'		=> 'joshim.work@gmail.com',
        	'password'	=> bcrypt('jo5262'),

        ]);
        DB::table('users')->insert([
        	'role_id' 	=> '2',
        	'name'		=> 'Sajib',
        	'email'		=> 'sajibhossain523@gmail.com',
        	'password'	=> bcrypt('sa5262'),

        ]);
    }
}
