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

        $name = array(
            1 => 'A',
            2 => 'B',
            3 => 'C',
            4 => 'D',
            5 => 'E',
            6 => 'F',
            7 => 'G',
            8 => 'H',
            9 => 'I',
            10 => 'K' 
        );

        for ($i = 1; $i <= 10; $i++) { 
        	DB::table('owners')->insert(
        		[
        			'name' 			=> 'Nguyễn Văn '.$name[$i],
        			'birthday'		=> $faker->date,
        			'id_card' 		=> $faker->unique()->biasedNumberBetween($min = 100000000000, $max = 300000000000),
        			'address' 		=> '123 Khu phố XXX, phường An Phú',
        			'business_cert'	=> str_random(10),
        			'security' 		=> str_random(10),
                    'created_at'    => new DateTime()
    			]
    		);
        }
    }
}
