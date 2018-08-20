<?php /** @noinspection NonAsciiCharacters */

/** @noinspection PhpUndefinedMethodInspection */

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testスレッド一覧取得が正常完了するか？()
    {
        $response = $this->get('/');
        $data = $response->baseResponse->original->getData();
        $threads = $data["threads"];

        $this->assertEquals("キーボード", $threads->get(0)->title);
        $this->assertEquals("Docker", $threads->get(19)->title);
    }

    public function test新しい順のスレッド一覧取得が正常完了するか？()
    {
        $response = $this->get('/?sort=new');
        $data = $response->baseResponse->original->getData();
        $threads = $data["threads"];

        $this->assertEquals("洗えるキッチンマット", $threads->get(0)->title);
        $this->assertEquals("Vim", $threads->get(19)->title);
    }

    public function test古い順のスレッド一覧取得が正常完了するか？()
    {
        $response = $this->get('/?sort=old');
        $data = $response->baseResponse->original->getData();
        $threads = $data["threads"];

        $this->assertEquals("Vim", $threads->get(0)->title);
        $this->assertEquals("洗えるキッチンマット", $threads->get(19)->title);
    }

    public function test更新順のスレッド一覧取得が正常完了するか？()
    {
        $response = $this->get('/?sort=update');
        $data = $response->baseResponse->original->getData();
        $threads = $data["threads"];

        $this->assertEquals("キーボード", $threads->get(0)->title);
        $this->assertEquals("Docker", $threads->get(19)->title);
    }
}
