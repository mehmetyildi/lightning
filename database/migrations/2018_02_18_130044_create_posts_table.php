<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('image_url')->nullable();
            $table->string('video_link')->nullable();
            $table->string('title');
            $table->string('url')->nullable();
            $table->boolean('publish')->default(0);
            $table->text('body');
            $table->text('body_small');
            $table->text('body_medium');
            $table->integer('state_id')->default(1);
            $table->text('reason_for_revise')->nullable();
            $table->integer('like')->default(0);
            $table->integer('dislike')->default(0);
            $table->integer('hit')->default(0);
            $table->timestamps();
            $table->dateTime('approved_at');
        });

        Schema::create('post_like', function (Blueprint $table) {
        
            $table->integer('post_id');
            $table->integer('user_id');
            $table->primary(['post_id','user_id']);
        });

        Schema::create('post_dislike', function (Blueprint $table) {
        
            $table->integer('post_id');
            $table->integer('user_id');
            $table->primary(['post_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_like');
        Schema::dropIfExists('post_dislike');
    }
}
