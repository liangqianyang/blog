<?php

use Illuminate\Database\Seeder;
use App\Models\AdminUser;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(AdminUser::class, 10)->create();

        // 单独处理第一个用户的数据
        $user = AdminUser::find(1);
        $user->name = 'admin';
        $user->email = '543492227@qq.com';
        $user->phone = '18501690304';
        $user->password = '6162e804bde9da66de96d3e69c56d061';
        $user->save();
    }
}
