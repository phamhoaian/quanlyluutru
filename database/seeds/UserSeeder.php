<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	DB::table('users')->insert(
        	[
                'role_id' => 2,
        		'name' => 'Quản trị viên',
            	'email' => 'admin@conganphuonganphu.com',
            	'password' => bcrypt('anPH@123'),
            	'active_flg' => 1,
                'official_flg' => 1,
            	'last_login' => new DateTime(),
            	'created_at' => new DateTime(),
        	]
    	);
    	DB::table('users')->insert(
        	[
        		'hotel_id' => '1',
            	'email' => 'user@conganphuonganphu.com',
            	'password' => bcrypt('anPH@123'),
            	'active_flg' => 1,
                'official_flg' => 1,
            	'last_login' => new DateTime(),
            	'created_at' => new DateTime(),
        	]
    	);
        DB::table('users')->insert(
            [
                'hotel_id' => '1',
                'email' => 'block@conganphuonganphu.com',
                'password' => bcrypt('anPH@123'),
                'active_flg' => 0,
                'official_flg' => 0,
                'last_login' => new DateTime(),
                'created_at' => new DateTime(),
            ]
        );
    }
}
