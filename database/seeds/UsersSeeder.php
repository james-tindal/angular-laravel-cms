<?php

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
        factory(HLS\User::class, 10)->create();
        factory(HLS\User::class, 2)->create(['administrator' => true]);
    }
}
