<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable(false)->comment('管理员id');
            $table->foreign('user_id')->references('id')->on('admin_users')->onDelete('cascade');
            $table->string('username',100)->nullable(false)->comment('管理员名称');
            $table->string('ip',100)->nullable(false)->comment('ip地址');
            $table->string('description',255)->nullable(false)->comment('操作描述');
            $table->text('params')->nullable(true)->comment('参数');
            $table->enum('status',['0','9'])->nullable(false)->comment('状态');
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
        Schema::dropIfExists('sys_logs');
    }
}
