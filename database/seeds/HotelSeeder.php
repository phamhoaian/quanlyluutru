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

        $hotel = array(
            1 => 'Nhà nghỉ AAA',
            2 => 'Nhà nghỉ BBB',
            3 => 'Nhà nghỉ CCC',
            4 => 'Nhà nghỉ DDD',
            5 => 'Nhà nghỉ EEE',
            6 => 'Khách sạn FFF',
            7 => 'Khách sạn GGG',
            8 => 'Khách sạn HHH',
            9 => 'Khách sạn III',
            10 => 'Khách sạn KKK',
        );

        for ($i = 1; $i <= 10; $i++) { 
        	DB::table('hotels')->insert(
        		[
        			'owner_id' 	=> rand(1,10),
        			'name' 		=> $hotel[$i],
        			'address' 	=> '123 Khu phố XXX, phường An Phú',
        			'phone'		=> '(0650) '.rand(100,999).'-'.rand(1000,9999),
        			'room' 		=> rand(10,50),
        			'type' 		=> rand(1,2),
                    'created_at' => new DateTime()
    			]
    		);
        }
    }
}
