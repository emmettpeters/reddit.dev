<?php

use Illuminate\Database\Seeder;
use App\User;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        $posts = [];

        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++)
        {
            $posts[] = [
                'title'=> $faker->name,
                'url'=> $faker->url,
                'content'=> $faker->text,
                'created_at'=> $faker->dateTime(),
                'updated_at'=> $faker->dateTime(),
                'user_id' => User::all()->random()->id
            ];
        }
        DB::table('posts')->insert($posts);
        
    }
}
