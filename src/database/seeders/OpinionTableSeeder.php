<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Opinion;

class OpinionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $param = [
            'fullname' => '椎田一郎',
            'gender' => 1,
            'email' => 'ichoro@gmail.com',
            'postcode' => '123-4567',
            'address' => '東京都小平市学園東町',
            'building_name' => '椎田ビル',
            'opinion' => '今後ともよろしくお願いします。今後ともよろしくお願いします。今後ともよろしくお願いします。今後ともよろしくお願いします。今後ともよろしくお願いします。'
        ];
        DB::table('opinions')->insert($param);
        $param = [
            'fullname' => '椎野三子',
            'gender' => 2,
            'email' => 'mitsuko@gmail.com',
            'postcode' => '223-4567',
            'address' => '東京都豊島区北池袋',
            'building_name' => '三子ビル',
            'opinion' => 'ありがとうございました、何かあれば連絡してください。'
        ];
        DB::table('opinions')->insert($param);

        Opinion::factory()->count(33)->create();
    }
}