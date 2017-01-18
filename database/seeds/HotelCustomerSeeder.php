<?php

use Illuminate\Database\Seeder;

class HotelCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 50; $i++) { 
        	DB::table('hotel_customer_map')->insert(
        		[
        			'hotel_id' 		=> rand(1,20),
        			'customer_id' 	=> rand(1,20),
        			'room_number'	=> rand(101, 150),
        			'check_in' 		=> $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get()),
        			'check_out'		=> $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get()),
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime()
    			]
    		);
        }
    }
}
