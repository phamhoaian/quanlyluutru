<?php

use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++) { 
        	DB::table('owners')->insert(
        		[
        			'name' 			=> $faker->name,
        			'birthday'		=> $faker->date,
        			'id_card' 		=> $faker->unique()->biasedNumberBetween($min = 100000000000, $max = 300000000000),
        			'address' 		=> $faker->address,
        			'business_cert'	=> str_random(10),
        			'security' 		=> str_random(10)
    			]
    		);
        }
    }
}
