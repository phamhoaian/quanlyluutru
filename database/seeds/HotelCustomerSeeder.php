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

        for ($i = 1; $i <= 500; $i++) { 
            $check_in = $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get());

        	DB::table('hotel_customer_map')->insert(
        		[
        			'hotel_id' 		=> rand(1,10),
        			'customer_id' 	=> rand(1,20),
        			'room_number'	=> rand(101, 150),
        			'check_in' 		=> $check_in,
        			'check_out'		=> $check_in,
                    'created_at'    => $check_in,
    			]
    		);
        }
    }
}
