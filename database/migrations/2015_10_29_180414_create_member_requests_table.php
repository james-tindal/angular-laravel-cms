<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('salutation',
                ['Mr', 'Mrs', 'Miss', 'Ms', 'Dr', 'Prof', 'Rev', 'Other']);
            $table->string('other-salutation')->nullable;
            $table->string('email');
            $table->string('phone-number');
            $table->string('job-title');
            $table->string('company-name');
            $table->string('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('member_requests');
    }
}
