<?php

namespace Tests\Unit;

use Tests\TestCase;
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
        $this->assertTrue(true);
    }

    public function testProvider() {
        $variations = [
            '企業情報' => [
                '有', '無'
            ],
            'ユーザ情報' => [
                '有・画像無', '有・画像有', '無',
            ],
            'グループ参加状態' => [
                '未参加', '申請中', '参加中'
            ]
        ];

        $keys = array_keys($variations);
        $counts = [];
        foreach (array_keys($variations) as $variation) {
            array_push($counts, count($variation));
        }

        $a = function($counts, $depth = 0, $indexies = []) use (&$a) {
            if ($depth >= count($counts)) {
                yield $indexies;
            } else {
                for ($i = 0; $i < $counts[$depth]; $i++) {
                    foreach ($a($counts, $depth + 1, array_merge($indexies, [$i])) as $ret) {
                        yield $ret;
                    }
                }
            }
        };

        $dataSets = [];

        return [
            'title' => [1, 1, 1],
            'a' => [1, 2, 1],
        ];
    }

    /**
     * @param $v1
     * @param $v2
     * @param $v3
     * @test
     * @dataProvider testProvider
     */
    public function test($v1, $v2, $v3)
    {
        $variations = [
            '企業情報' => [
                '有', '無'
            ],
            'ユーザ情報' => [
                '有・画像無', '有・画像有', '無',
            ],
            'グループ参加状態' => [
                '未参加', '申請中', '参加中'
            ]
        ];
        $a = function($variations, $depth = 0, $indexies = []) use (&$a) {
            $keys = array_keys($variations);
            if ($depth >= count($keys)) {
                yield $indexies;
            } else {
                $key = $keys[$depth];
                for ($i = 0; $i < count($variations[$key]); $i++) {
                    $val = $variations[$key][$i];
                    foreach ($a($variations, $depth + 1, array_merge($indexies, [$key => $val])) as $ret) {
                        yield $ret;
                    }
                }
            }
        };
        foreach ($a($variations) as $i) {
            var_dump($i);
        }


        $a = function($counts, $depth = 0, $indexies = []) use (&$a) {
            if ($depth >= count($counts)) {
                yield $indexies;
            } else {
                for ($i = 0; $i < $counts[$depth]; $i++) {
                    foreach ($a($counts, $depth + 1, array_merge($indexies, [$i])) as $ret) {
                        yield $ret;
                    }
                }
            }
        };
        foreach ($a([2,2]) as $i) {
            var_dump($i);
        }

        $this->assertEquals(true, false);
    }
}
