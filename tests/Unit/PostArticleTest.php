<?php

namespace Tests\Unit;

use App\PostArticle;
use Tests\TestCase;
use DB;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $q = PostArticle::query();

        $entryDate = "2018-10";

        // 指定年月に作成されていた記事で絞り込む
        $q->where(function($q) use ($entryDate) {
            $q->where(function($q) use ($entryDate) {
                $q->whereNull('deleted_at');
                $q->where(DB::raw('DATE_FORMAT(created_at, \'%Y-%m\')'), '<=', $entryDate);
            });
            $q->orWhere(function($q) use ($entryDate) {
                $q->where(DB::raw('DATE_FORMAT(deleted_at, \'%Y-%m\')'), '>=', $entryDate);
                $q->where(DB::raw('DATE_FORMAT(created_at, \'%Y-%m\')'), '<=', $entryDate);
            });
        });

        $q->with([
            'entryHistories' => function($q) use ($entryDate)
            {
                $q->select('id', 'post_article_id', 'entry_date', 'entry_count');
                $q->where('entry_date', $entryDate);
            },
        ]);

        $rs = $q->get();

        $summary = [];

        $grouped = $rs->groupBy('job_id');
        foreach ($grouped as $jobId => $articles) {
            $summary[$jobId] = $articles->sum(function($article) {
                return $article->entryHistories->sum('entry_count');
            });
        }
        self::assertEquals($r);
    }
}
