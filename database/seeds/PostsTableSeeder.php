<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('posts')->delete();
        
        $posts = [];

        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 10; $i++)
        {
            $posts[] = [
                'title'=> $faker->name,
                'url'=> $faker->url,
                'content'=> $faker->text,
                'created_at'=> $faker->dateTime(),
                'updated_at'=> $faker->dateTime()
            ];
        }
        DB::table('posts')->insert($posts);
    }
}
