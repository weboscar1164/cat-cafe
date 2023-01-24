<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ダミー記事生成件数
        $num = 150;

        $insertData = array_map(
            function ($no) use ($num) {
                $phone = random_int(0, 1) === 1 ? '09012345678' : null;
                $created_at = today()->subMinutes($num + $no + 1)->setHours(random_int(9, 18))->setMinutes(random_int(0, 59));
                $updated_at = random_int(0, 1) === 1 ? today()->subMinutes(random_int(1, $num + $no))->setHours(random_int(9, 18))->setMinutes(random_int(0, 59)) : $created_at;
                return [
                    'name' => '田中　太郎' . $no,
                    'name_kana' => 'タナカ　タロウ' . $no,
                    'email' => 'tanaka@example.com',
                    'phone' => $phone,
                    'body' => $no . "番目のお問い合わせです。\nここで改行されています\n\nここには空行が設定されています\n<p>ここはpタグで囲われています</p><script>alert('アラートが実行されたらXSS対策不備')</script>",
                    'created_at' => $created_at,
                    'updated_at' => $updated_at
                ];
            },
            range(1, $num)
        );
        DB::table('contacts')->insert($insertData);
    }
}