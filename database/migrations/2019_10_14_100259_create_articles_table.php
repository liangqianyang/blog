<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('cid')->nullable(false)->comment('分类ID');
            $table->foreign('cid')->references('id')->on('categories')->onDelete('cascade');
            $table->string('title',100)->nullable(false)->comment('文章标题');
            $table->text('content')->nullable(false)->comment('文章内容');
            $table->enum('is_admin',[0,1])->nullable(false)->comment('是否是后台发布');
            $table->string('admin_name',100)->nullable(true)->comment('管理员名称');
            $table->timestamp('publish_date')->nullable()->comment('发布日期');
            $table->string('cover',255)->nullable()->comment('封面图');
            $table->enum('status',[0,9])->nullable(false)->default('0')->comment('状态 0:正常 9:下架');
            $table->unsignedInteger('user_id')->nullable(false)->comment('创建者用户id');
            $table->timestamps();
            $table->index('title','blog_articles_title');
            $table->index('status','blog_articles_status');
            $table->index('publish_date','blog_articles_publish_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
