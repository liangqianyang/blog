<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100)->nullable(false)->index('index_role_name')->comment('角色名称');
            $table->string('remark','255')->nullable(true)->comment('备注');
            $table->unsignedBigInteger('create_user_id')->nullable(false)->comment('创建者ID');
            $table->foreign('create_user_id')->references('id')->on('admin_users')->onDelete('cascade');
            $table->enum('status', array(0, 9))->default(0)->comment('状态');
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
        Schema::dropIfExists('admin_roles');
    }
}
