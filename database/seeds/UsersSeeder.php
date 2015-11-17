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
            'name' => 'James Brown',
            'email' => 'j@mesbrown.co.uk',
            'password' => bcrypt('password')
        ]);

        User::create([
            'administrator' => true,
            'name' => 'Frank Martin',
            'email' => 'frank.martin@digital-results.com',
            'password' => bcrypt('password')
        ]);

        User::create([
            'administrator' => true,
            'name' => 'ITVET',
            'email' => 'itvet@itvet.co.uk',
            'password' => bcrypt('password')
        ]);

        factory(User::class, 5)->create();
    }
}
