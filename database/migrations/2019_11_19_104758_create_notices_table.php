<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',100)->nullable(false)->comment('公告标题');
            $table->text('content')->nullable(false)->comment('公告内容');
            $table->unsignedTinyInteger('is_top')->nullable(false)->default(0)->comment('是否置顶');
            $table->timestamps();
            $table->index('title','blog_notices_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notices');
    }
}
