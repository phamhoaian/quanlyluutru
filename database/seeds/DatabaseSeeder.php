<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(OwnerSeeder::class);
        $this->call(HotelSeeder::class);
        $this->call(NoticeSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(HotelCustomerSeeder::class);
        Model::reguard();        
    }
}
