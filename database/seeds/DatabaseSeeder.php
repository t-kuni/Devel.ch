<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ImagesTableSeeder::class);
        $this->call(ThreadsTableSeeder::class);
        $this->call(ThreadCommentsTableSeeder::class);
        $this->call(PostArticlesSeeder::class);
        $this->call(EntryHistoriesSeeder::class);
    }
}
