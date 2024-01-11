<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //todo_listsという名前のテーブルのデータを作成したり、取得できる
        DB::table('todo_lists')->insert(
          //配列の中にデータを追加していく。
          [
            [
            'name' => 'テスト1',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'name' => 'テスト2',
            'created_at' => now(),
            'updated_at' => now(),
          ],
          ]
        );
    }
}
