<?php

use Illuminate\Database\Seeder;

class EntryHistoriesSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('entry_histories')->delete();

        \DB::table('entry_histories')->insert(array (
            array (
                'post_article_id' => 1,
                'name' => 'entry1',
                'entry_date' => '2018-10',
                'entry_count' => 1,
                'deleted_at' => null,
                'created_at' => '2017-06-24 03:18:09',
                'updated_at' => '2017-06-24 03:18:09',
            ),
        ));


    }
}