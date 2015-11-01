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
        factory(User::class, 10)->create();
        factory(User::class, 2)->create(['administrator' => true]);

        User::create([
            'administrator' => true,
            'name' => 'James Brown',
            'email' => 'j@mesbrown.co.uk',
            'password' => bcrypt('password')
        ]);
    }
}
