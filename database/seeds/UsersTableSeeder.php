<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->delete();

        $users = [];

        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++)
        {
            $users[] = [
                'name'=> $faker->name,
                'email'=> $faker->email,
                'password'=> $faker->password,
                'created_at'=> $faker->dateTime(),
                'updated_at'=> $faker->dateTime()
            ];
        }
        DB::table('users')->insert($users);
    }
}
