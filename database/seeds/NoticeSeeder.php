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

        for($i = 1; $i <= 20;$i++)
        {
        	DB::table('notice')->insert(
	        	[
                    'message' => $faker->text,
	        		'url' => $faker->url,
	            	'type' => rand(1,4),
	            	'created_at' => new DateTime(),
	            	'updated_at' => new DateTime(),
	        	]
        	);
        }
    }
}
