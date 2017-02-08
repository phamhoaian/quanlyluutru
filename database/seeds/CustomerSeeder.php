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

        $first_name = array(
            1 => 'Nguyễn Văn ',
            2 => 'Trần Văn ',
            3 => 'Phạm Thị ',
            4 => 'Lê Thị '
        );

        for ($i = 1; $i <= 20; $i++) { 
            $type = rand(1,4);
            if (in_array($type, array(1,2)))
            {
                $sex = 1;
            }
            else
            {
                $sex = 2;
            }

        	DB::table('customers')->insert(
        		[
        			'name' 			=> $first_name[$type] . $name[rand(1,10)],
        			'year_of_birth'	=> rand(1970, 1998),
        			'address' 		=> 'An Phú, Thuận An, Bình Dương',
        			'id_card'		=> $faker->unique()->biasedNumberBetween($min = 100000000000, $max = 300000000000),
        			'sex' 			=> $sex,
                    'created_at'    => new DateTime()
    			]
    		);
        }
    }
}
