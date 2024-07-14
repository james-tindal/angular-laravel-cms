<?php

use HLS\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'administrator' => true,
            'name' => 'Test Admin',
            'email' => 'test',
            'password' => bcrypt('p')
        ]);

        factory(User::class, 5)->create();
    }
}
