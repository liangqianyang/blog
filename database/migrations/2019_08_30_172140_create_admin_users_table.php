<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\AdminUser;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100)->nullable(false)->index('index_name')->comment('管理员名称');
            $table->string('password', 100)->nullable(false)->comment('密码');
            $table->string('email', 100)->nullable(true)->comment('邮箱');
            $table->bigInteger('phone')->nullable(false)->index('index_phone')->comment('手机号码');
            $table->enum('status', array_keys(AdminUser::$statusMap))->default(AdminUser::STATUS_ENABLE)->comment('管理员状态');
            $table->bigInteger('create_user_id')->nullable(false)->comment('创建者ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
}
