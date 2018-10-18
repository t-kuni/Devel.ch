<?php

use Illuminate\Database\Seeder;

class PostArticlesSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('post_articles')->delete();
        
        \DB::table('post_articles')->insert(array (
            array (
                'job_id' => 1,
                'name' => 'art1',
                'deleted_at' => null,
                'created_at' => '2018-09-24 03:18:09',
                'updated_at' => '2017-06-24 03:18:09',
            ),
            array (
                'job_id' => 2,
                'name' => 'art2',
                'deleted_at' => null,
                'created_at' => '2018-10-24 03:18:09',
                'updated_at' => '2017-06-24 03:18:09',
            ),
            array (
                'job_id' => 3,
                'name' => 'art3',
                'deleted_at' => null,
                'created_at' => '2018-11-24 03:18:09',
                'updated_at' => '2017-06-24 03:18:09',
            ),
        ));
        
        
    }
}