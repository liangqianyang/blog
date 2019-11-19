<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',100)->nullable(false)->comment('素材标题');
            $table->string('url',255)->nullable(false)->comment('素材链接');
            $table->unsignedInteger('width')->nullable(false)->comment('图片宽度');
            $table->unsignedInteger('height')->nullable(false)->comment('图片高度');
            $table->unsignedSmallInteger('type')->nullable(false)->comment('图片类型');
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
        Schema::dropIfExists('materials');
    }
}
