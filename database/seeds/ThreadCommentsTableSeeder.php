<?php

use Illuminate\Database\Seeder;

class ThreadCommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('thread_comments')->delete();
        
        \DB::table('thread_comments')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => NULL,
                'text' => '> 30億のデバイスで動いて客先で動かないjava',
                'password' => '24565683',
                'thread_id' => 10,
                'image_id' => NULL,
                'created_at' => '2017-06-30 14:53:25',
                'updated_at' => '2017-06-30 14:53:25',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => NULL,
                'text' => 'Rails慣れないわ',
                'password' => '24565683',
                'thread_id' => 16,
                'image_id' => NULL,
                'created_at' => '2017-06-30 14:54:28',
                'updated_at' => '2017-06-30 14:54:28',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => NULL,
                'text' => '最初のハードル高すぎ',
                'password' => '24565683',
                'thread_id' => 1,
                'image_id' => NULL,
                'created_at' => '2017-06-30 23:36:57',
                'updated_at' => '2017-06-30 23:36:57',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => NULL,
                'text' => 'phpでyield使えたんだな

```php
function from() {
yield 1; // キー 0
yield 2; // キー 1
yield 3; // キー 2
}
```',
                'password' => '24565683',
                'thread_id' => 2,
                'image_id' => NULL,
                'created_at' => '2017-06-30 23:54:54',
                'updated_at' => '2017-06-30 23:54:54',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => NULL,
                'text' => '# 即push -f',
                'password' => '24565683',
                'thread_id' => 9,
                'image_id' => NULL,
                'created_at' => '2017-07-01 01:30:10',
                'updated_at' => '2017-07-01 01:30:10',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => NULL,
                'text' => '老兵が操作を覚えてくれない',
                'password' => '24565683',
                'thread_id' => 9,
                'image_id' => NULL,
                'created_at' => '2017-07-01 14:53:20',
                'updated_at' => '2017-07-01 14:53:20',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => NULL,
                'text' => 'Linuxでしか使わない',
                'password' => '24565683',
                'thread_id' => 1,
                'image_id' => NULL,
                'created_at' => '2017-07-04 12:07:27',
                'updated_at' => '2017-07-04 12:07:27',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => NULL,
                'text' => '使いどころがわからん',
                'password' => '24565683',
                'thread_id' => 2,
                'image_id' => NULL,
                'created_at' => '2017-07-04 12:08:51',
                'updated_at' => '2017-07-04 12:08:51',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => NULL,
                'text' => 'コストと品質を重視し、小ロット輸入でも個人でも新商品の開発と商品の仕入れができます。対応できる分野も様々なので、何かありましたらお気軽にご連絡ください。
URL: http://www.cgksupply.com/business/%E4%B8%AD%E5%9B%BD%E8%BC%B8%E5%85%A5%E4%BB%A3%E8%A1%8C/ 
Email:　info@gafound.com',
                'password' => '111111',
                'thread_id' => 1,
                'image_id' => NULL,
                'created_at' => '2017-08-24 03:53:34',
                'updated_at' => '2017-08-24 03:53:34',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => NULL,
                'text' => 'コストと品質を重視し、小ロット輸入でも個人でも新商品の開発と商品の仕入れができます。対応できる分野も様々なので、何かありましたらお気軽にご連絡ください。
URL: http://www.cgksupply.com/business/%E4%B8%AD%E5%9B%BD%E8%BC%B8%E5%85%A5%E4%BB%A3%E8%A1%8C/ 
Email:　info@gafound.com',
                'password' => '111111',
                'thread_id' => 2,
                'image_id' => NULL,
                'created_at' => '2017-08-24 03:55:44',
                'updated_at' => '2017-08-24 03:55:44',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => NULL,
                'text' => 'コストと品質を重視し、小ロット輸入でも個人でも新商品の開発と商品の仕入れができます。対応できる分野も様々なので、何かありましたらお気軽にご連絡ください。
URL: http://www.cgksupply.com/business/%E4%B8%AD%E5%9B%BD%E8%BC%B8%E5%85%A5%E4%BB%A3%E8%A1%8C/ 
Email:　info@gafound.com',
                'password' => '111111',
                'thread_id' => 3,
                'image_id' => NULL,
                'created_at' => '2017-08-24 03:56:25',
                'updated_at' => '2017-08-24 03:56:25',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'あｓｄふぁｓｄｆ',
                'text' => 'おひおひおひおひおひ',
                'password' => ';lkjasdf',
                'thread_id' => 16,
                'image_id' => NULL,
                'created_at' => '2018-08-18 01:42:14',
                'updated_at' => '2018-08-18 01:42:14',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => NULL,
            'text' => '![asdf](http://)',
                'password' => ';lkjasdf',
                'thread_id' => 2,
                'image_id' => NULL,
                'created_at' => '2018-08-18 02:57:09',
                'updated_at' => '2018-08-18 02:57:09',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'あｓｄｆ',
                'text' => 'あｆｄｓ',
                'password' => 'asdfasdf',
                'thread_id' => 1,
                'image_id' => NULL,
                'created_at' => '2018-08-18 04:37:12',
                'updated_at' => '2018-08-18 04:37:12',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'test',
                'text' => 'test',
                'password' => 'testtest',
                'thread_id' => 14,
                'image_id' => NULL,
                'created_at' => '2018-08-19 08:37:45',
                'updated_at' => '2018-08-19 08:37:45',
            ),
        ));
        
        
    }
}