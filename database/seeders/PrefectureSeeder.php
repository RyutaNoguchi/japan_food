<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrefectureSeeder extends Seeder
{
    
    public function run()
    {
        $pref = [
        '北海道','青森','岩手','宮城','秋田','山形','福島','茨城','栃木','群馬','埼玉','千葉','東京','神奈川','新潟','富山','石川','福井','山梨','長野','岐阜','静岡','愛知','三重','滋賀','京都','大阪','兵庫','奈良','和歌山','鳥取','島根','岡山','広島','山口','徳島','香川','愛媛','高知','福岡','佐賀','長崎','熊本','大分','宮崎','鹿児島','沖縄'
        ];
    
        $params = array();
        for ($i = 0; $i < 47; $i++) {
            $params[] = [
                'id' => $i + 1,
                'code' => $i + 1,
                'name' => $pref[$i],
                'color' => "#FFECB3",
                'hoverColor' => "#FFA000",
            ];
        }
        
        foreach ($params as $param) {
            DB::table('prefectures')->insert($param);
        }
    }
}
