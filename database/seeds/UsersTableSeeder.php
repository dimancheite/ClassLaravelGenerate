<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		/*
		 * User roles:
		 * 0 : Super admin
		 * 1 : Editor
		 */

		DB::table('users')->insert([
			'name' => 'admin',
			'email' => 'admin@gamil.com',
			'password' => bcrypt('12345678'),
			'role' => 0
		]);
    }
}
