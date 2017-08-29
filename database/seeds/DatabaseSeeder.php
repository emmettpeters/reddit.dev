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

        // $this->command->info('Deleting users records');
        // There are also comment() and error() methods that output different colors

        // DB::table('users')->delete();

        $this->call('UsersTableSeeder');

        Model::reguard();
    }
}
