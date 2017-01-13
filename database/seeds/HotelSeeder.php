<?php

use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 20; $i++) { 
        	DB::table('hotels')->insert(
        		[
        			'owner_id' 	=> rand(1,10),
        			'name' 		=> $faker->name,
        			'address' 	=> $faker->address,
        			'phone'		=> $faker->tollFreePhoneNumber,
        			'room' 		=> rand(10,100),
        			'type' 		=> rand(1,2)
    			]
    		);
        }
    }
}
