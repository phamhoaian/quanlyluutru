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
        		'name' => 'Administrator',
            	'email' => 'admin@gmail.com',
            	'password' => bcrypt('anph@123'),
            	'remember_token' => str_random(10),
            	'active_flg'=> 1,
            	'last_login' => new DateTime(),
            	'created_at' => new DateTime(),
        	]
    	);
    	DB::table('users')->insert(
        	[
        		'name' => 'User',
            	'email' => 'user@gmail.com',
            	'password' => bcrypt('anph@123'),
            	'remember_token' => str_random(10),
            	'active_flg'=> 1,
            	'last_login' => new DateTime(),
            	'created_at' => new DateTime(),
        	]
    	);

        $active = array(0,1);

        for($i = 1; $i <= 10;$i++)
        {
        	DB::table('users')->insert(
	        	[
	        		'name' => $faker->name,
	            	'email' => $faker->unique()->email,
	            	'password' => bcrypt('anph@123'),
	            	'remember_token' => str_random(10),
	            	'active_flg'=> rand(0,1),
	            	'created_at' => new DateTime(),
	        	]
        	);
        }
    }
}
