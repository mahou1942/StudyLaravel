<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Animal;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use App\Models\Type;
use function Termwind\ValueObjects\truncate;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //取消外鍵約束
        Schema::disableForeignKeyConstraints();
        Animal::truncate(); //清空animals資料表 ID歸零
        User::truncate(); //清空user資料表 ID歸稜
        Type::truncate(); //清空types資料表 ID歸零

        // 先產生Type資料
        Type::factory(5)->create();
        // 建立5筆會員測試資料
        User::factory(5)->create();
        //建立一萬筆動物測試資料
        Animal::factory(10000)->create();
        //開啟外鍵約束
        Schema::enableForeignKeyConstraints();
    }
}
