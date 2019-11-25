<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('栏目名称');
            $table->bigInteger('parent_id')->nullable(false)->comment('父ID');
            $table->string('url',100)->nullable(false)->comment('链接');
            $table->string('image',255)->nullable(false)->comment('栏目图片');
            $table->string('summary',100)->nullable(false)->comment('栏目简介');
            $table->unsignedInteger('level')->comment('等级');
            $table->string('path')->comment('路径');
            $table->enum('is_category',[0,1])->default('1')->comment('是否是分类');
            $table->unsignedInteger('sort')->nullable(false)->default(1)->comment('排序');
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
        Schema::dropIfExists('categories');
    }
}
