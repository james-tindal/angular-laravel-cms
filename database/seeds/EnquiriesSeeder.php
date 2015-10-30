<?php

use Illuminate\Database\Seeder;

class EnquiriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(HLS\Enquiry::class, 10)->create();
    }
}
