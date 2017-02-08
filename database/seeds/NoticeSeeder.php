<?php

use Illuminate\Database\Seeder;

class NoticeSeeder extends Seeder
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

        $action = array(
            1 => ' đã khai báo khách lưu trú.',
            2 => ' đã được đăng ký.',
            3 => ' đã thiết lập thông tin ban đầu.',
            4 => ' đã cập nhập thông tin.',
        );

        $url = array(
            1 => 'quan-ly/tim-kiem',
            2 => 'quan-ly/nha-nghi-khach-san',
            3 => 'quan-ly/nha-nghi-khach-san',
            4 => 'quan-ly/nha-nghi-khach-san',
        );

        for($i = 1; $i <= 20;$i++)
        {
            $type = rand(1,4);
        	DB::table('notice')->insert(
	        	[
                    'message' => $hotel[rand(1,10)] . $action[$type],
	        		'url' => $url[$type],
	            	'type' => $type,
                    'read_flg' => 0,
	            	'created_at' => new DateTime(),
	            	'updated_at' => new DateTime(),
	        	]
        	);
        }
    }
}
