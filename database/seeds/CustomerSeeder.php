<?php

use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
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
        	DB::table('customers')->insert(
        		[
        			'name' 			=> $faker->name,
        			'year_of_birth'	=> rand(1970, 2000),
        			'address' 		=> $faker->address,
        			'id_card'		=> $faker->unique()->biasedNumberBetween($min = 100000000000, $max = 300000000000),
        			'sex' 			=> rand(1,2)
    			]
    		);
        }
    }
}
