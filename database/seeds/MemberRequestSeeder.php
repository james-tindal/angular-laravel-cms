<?php

use Illuminate\Database\Seeder;

class MemberRequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(HLS\MemberRequest::class, 10)->create();
    }
}
