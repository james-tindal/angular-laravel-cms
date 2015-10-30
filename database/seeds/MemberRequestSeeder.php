<?php

use HLS\MemberRequest;
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
        factory(MemberRequest::class, 10)->create();
    }
}
