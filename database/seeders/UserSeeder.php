<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ダミー記事生成件数
        $num = 20;

        $insertData = array_map(
            function ($no) use ($num) {
                $created_at = today()->subMinutes($num + $no + 1)->setHours(random_int(9, 18))->setMinutes(random_int(0, 59));
                return [
                    'name' => 'user' . $no,
                    'email' => 'user' . $no . '@email.com',
                    'image' => 'blogs/dummy.jpg',
                    'introduction' => "店員のuser" . $no . "です。\nよろしくお願いします。",
                    'password' => Hash::make('password123'),
                    'created_at' => $created_at,
                ];
            },
            range(1, $num)
        );
        DB::table('users')->insert($insertData);
    }
}