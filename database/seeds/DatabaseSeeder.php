<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UserSeeder::class);
//        $this->call(QuestionTableSeeder::class);
        factory(\App\User::class, 3)->create()->each(function ($user) {
            $user->questions()->saveMany(
                factory(\App\Models\Question::class, rand(1, 5))
                    ->make()//用make 只是生成但是不直接插入记录到数据库，而是使用questions 模型关联的saveMany方法
            //保存到数据库
            );
        });
    }
}
