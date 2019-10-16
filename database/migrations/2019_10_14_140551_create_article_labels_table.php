<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_labels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('a_id')->nullable(false)->comment('文章ID');
            $table->foreign('a_id')->references('id')->on('articles')->onDelete('cascade');
            $table->unsignedBigInteger('label_id')->nullable(false)->comment('标签ID');
            $table->foreign('label_id')->references('id')->on('labels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_labels');
    }
}
