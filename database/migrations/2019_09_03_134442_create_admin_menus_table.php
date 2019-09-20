<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\AdminMenu;

class CreateAdminMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('parent_id')->nullable(false)->comment('父ID');
            $table->string('name', 100)->nullable(false)->index('index_name')->comment('菜单名称');
            $table->string('url', 100)->nullable(true)->comment('路由');
            $table->enum('type', array_keys(AdminMenu::$typesMap))->comment('菜单类型');
            $table->string('icon', 100)->nullable(true)->comment('菜单图标');
            $table->unsignedSmallInteger('sort')->default(10)->comment('排序');
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
        Schema::dropIfExists('admin_menus');
    }
}
