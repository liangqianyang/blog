<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUserTokens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_user_tokens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('管理员ID');
            $table->foreign('user_id')->references('id')->on('admin_users')->onDelete('cascade');
            $table->string('token', 100)->nullable(false)->comment('管理员登陆token');
            $table->integer('expire_time')->comment('过期时间');
            $table->timestamp('updated_at')->comment('更新时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_user_tokens');
    }
}
