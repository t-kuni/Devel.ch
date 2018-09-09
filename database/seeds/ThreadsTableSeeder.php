<?php

use Illuminate\Database\Seeder;

class ThreadsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('threads')->delete();
        
        \DB::table('threads')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Vim',
                'password' => '24565683',
                'text' => '# Vimのスレです

neovimも可',
                'image_id' => 1,
                'created_at' => '2017-06-24 03:18:09',
                'updated_at' => '2017-06-24 03:18:09',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'PHP',
                'password' => '24565683',
                'text' => 'PHPについて語ろう',
                'image_id' => 2,
                'created_at' => '2017-06-24 03:19:26',
                'updated_at' => '2017-06-24 03:19:26',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'React',
                'password' => '24565683',
                'text' => '# React
Reactって結局どうなの？',
                'image_id' => 3,
                'created_at' => '2017-06-24 03:20:36',
                'updated_at' => '2017-06-24 03:20:36',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Docker',
                'password' => '24565683',
                'text' => 'コンテナ化うんぬん',
                'image_id' => 4,
                'created_at' => '2017-06-24 03:23:31',
                'updated_at' => '2017-06-24 03:23:31',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Linux全般',
                'password' => '24565683',
                'text' => 'Linux全般スレ',
                'image_id' => 5,
                'created_at' => '2017-06-25 13:04:22',
                'updated_at' => '2017-06-25 13:04:22',
            ),
            5 => 
            array (
                'id' => 6,
                'title' => 'HTML5',
                'password' => '24565683',
                'text' => 'css3含む',
                'image_id' => 6,
                'created_at' => '2017-06-25 13:06:33',
                'updated_at' => '2017-06-25 13:06:33',
            ),
            6 => 
            array (
                'id' => 7,
                'title' => 'python',
                'password' => '24565683',
                'text' => 'DeepLerningで再燃してきてる感がある',
                'image_id' => 7,
                'created_at' => '2017-06-25 13:09:05',
                'updated_at' => '2017-06-25 13:09:05',
            ),
            7 => 
            array (
                'id' => 8,
                'title' => 'nodejs',
                'password' => '24565683',
                'text' => '# nodejsスレ',
                'image_id' => 8,
                'created_at' => '2017-06-25 13:09:46',
                'updated_at' => '2017-06-25 13:09:46',
            ),
            8 => 
            array (
                'id' => 9,
                'title' => 'git',
                'password' => '24565683',
                'text' => 'みんな大好きgitのスレ',
                'image_id' => 9,
                'created_at' => '2017-06-25 13:11:21',
                'updated_at' => '2017-06-25 13:11:21',
            ),
            9 => 
            array (
                'id' => 10,
                'title' => 'java',
                'password' => '24565683',
                'text' => '30億のデバイスで走るJava',
                'image_id' => 10,
                'created_at' => '2017-06-25 13:12:24',
                'updated_at' => '2017-06-25 13:12:24',
            ),
            10 => 
            array (
                'id' => 11,
                'title' => 'Gradle',
                'password' => '24565683',
                'text' => 'グラドル？グレードル？',
                'image_id' => 11,
                'created_at' => '2017-06-25 13:15:47',
                'updated_at' => '2017-06-25 13:15:47',
            ),
            11 => 
            array (
                'id' => 12,
                'title' => 'apache',
                'password' => '24565683',
                'text' => '**アパッチ**',
                'image_id' => 12,
                'created_at' => '2017-06-25 13:16:49',
                'updated_at' => '2017-06-25 13:16:49',
            ),
            12 => 
            array (
                'id' => 13,
                'title' => 'MySQL',
                'password' => '24565683',
                'text' => 'mysqlスレ',
                'image_id' => 13,
                'created_at' => '2017-06-25 13:18:51',
                'updated_at' => '2017-06-25 13:18:51',
            ),
            13 => 
            array (
                'id' => 14,
                'title' => 'キーボード',
                'password' => '24565683',
                'text' => 'キーボードスレ
こだわってる？',
                'image_id' => 14,
                'created_at' => '2017-06-25 13:20:00',
                'updated_at' => '2017-06-25 13:20:00',
            ),
            14 => 
            array (
                'id' => 15,
                'title' => '椅子スレ',
                'password' => '24565683',
                'text' => '大事',
                'image_id' => 15,
                'created_at' => '2017-06-25 13:23:22',
                'updated_at' => '2017-06-25 13:23:22',
            ),
            15 => 
            array (
                'id' => 16,
                'title' => 'Ruby',
                'password' => '24565683',
                'text' => 'ruby',
                'image_id' => 16,
                'created_at' => '2017-06-25 13:24:47',
                'updated_at' => '2017-06-25 13:24:47',
            ),
            16 => 
            array (
                'id' => 17,
                'title' => 'Slackスレ',
                'password' => '24565683',
                'text' => 'どんなbot使ってる？',
                'image_id' => 17,
                'created_at' => '2017-06-30 14:56:29',
                'updated_at' => '2017-06-30 14:56:29',
            ),
            17 => 
            array (
                'id' => 18,
                'title' => '受託開発　　　',
                'password' => '111111',
                'text' => 'コストと品質を重視し、小ロット輸入でも個人でも新商品の開発と商品の仕入れができます。対応できる分野も様々なので、何かありましたらお気軽にご連絡ください。
URL: http://www.cgksupply.com/business/%E4%B8%AD%E5%9B%BD%E8%BC%B8%E5%85%A5%E4%BB%A3%E8%A1%8C/ 
Email:　info@gafound.com',
                'image_id' => NULL,
                'created_at' => '2017-08-22 04:01:20',
                'updated_at' => '2017-08-22 04:01:20',
            ),
            18 => 
            array (
                'id' => 19,
                'title' => 'ウィメンズ',
                'password' => '111111',
                'text' => '素材：ポリエステル100％
サイズ：フリー
OEM&ODM：可
パッキング：ビニール袋
最低注文量：20pcs
無料サンプル：有り（送料は御社負担）※価格に送料は含まれておりません。  
郵送料金のご参考（20\'GPコンテナ）　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
東 京→150ドル/3-5日かかります。　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
大 阪→180ドル/2-3日かかります。　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
名古屋→180ドル/2-3日かかります。
URL: http://www.cgksupply.com/2017/08/18/%E3%82%A6%E3%82%A3%E3%83%A1%E3%83%B3%E3%82%BA/
Email:　info@gafound.com',
                'image_id' => NULL,
                'created_at' => '2017-08-29 01:54:34',
                'updated_at' => '2017-08-29 01:54:34',
            ),
            19 => 
            array (
                'id' => 20,
                'title' => '洗えるキッチンマット',
                'password' => '11111',
                'text' => 'やわらかく折りたたみやすいので洗濯がラクラク！デザインもシンプルでかわいい。
素材：綿100％
OEM&ODM:可
パッキング：ビニール袋
最低注文量：20pcs
無料サンプル：有り（送料は御社負担）
URL: http://www.cgksupply.com/2017/08/18/%E3%82%AD%E3%83%83%E3%83%81%E3%83%B3%E3%83%9E%E3%83%83%E3%83%88/
Email:　info@gafound.com',
                'image_id' => NULL,
                'created_at' => '2017-08-31 02:37:58',
                'updated_at' => '2017-08-31 02:37:58',
            ),
        ));
        
        
    }
}