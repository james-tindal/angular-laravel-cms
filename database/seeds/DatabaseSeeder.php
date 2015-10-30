<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $toTruncate = [
        'article_category',
        'articles',
        'categories',
        'enquiries',
        'events',
        'member_requests',
        'users'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::statement("SET foreign_key_checks = 0");
        foreach($this->toTruncate as $table) {
            DB::table($table)->truncate();
        }
        DB::statement("SET foreign_key_checks = 1");

        $this->call(CategoriesSeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(EnquiriesSeeder::class);
        $this->call(EventsSeeder::class);
        $this->call(MemberRequestSeeder::class);
        $this->call(UsersSeeder::class);

        Model::reguard();
    }
}
