<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('url')->nullable();
            $table->timestamps();
        });

        Schema::create('post_tag', function (Blueprint $table) {
        
            $table->integer('post_id');
            $table->integer('tag_id');
            $table->primary(['post_id','tag_id']);
        });

        Schema::create('tag_video', function (Blueprint $table) {
        
            $table->integer('video_id');
            $table->integer('tag_id');
            $table->primary(['video_id','tag_id']);
        });

        Schema::create('book_tag', function (Blueprint $table) {
        
            $table->integer('book_id');
            $table->integer('tag_id');
            $table->primary(['book_id','tag_id']);
        });

        Schema::create('activity_tag', function (Blueprint $table) {
        
            $table->integer('activity_id');
            $table->integer('tag_id');
            $table->primary(['activity_id','tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('tag_video');
        Schema::dropIfExists('activity_tag');
        Schema::dropIfExists('book_tag');
    }
}
