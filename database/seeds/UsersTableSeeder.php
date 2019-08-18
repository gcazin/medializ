<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        $password = Hash::make("socialshare");

        for($i = 0;$i > 10;$i++) {
            DB::table("users")->insert([
                'name' => $faker->userName,
                'email' => $faker->email,
                'password' => $password
            ]);
        }

    }
}
