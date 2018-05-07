<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('image_url')->nullable();
            $table->string('title');
            $table->string('url')->nullable();
            $table->integer('age_begin');
            $table->integer('age_end');
            $table->string('author');
            $table->string('translated_by');
            $table->string('publisher');
            $table->integer('year');
            $table->integer('booktype_id');
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

        Schema::create('book_like', function (Blueprint $table) {
        
            $table->integer('book_id');
            $table->integer('user_id');
            $table->primary(['book_id','user_id']);
        });

        Schema::create('book_dislike', function (Blueprint $table) {
        
            $table->integer('book_id');
            $table->integer('user_id');
            $table->primary(['book_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
        Schema::dropIfExists('book_like');
        Schema::dropIfExists('book_dislike');
    }
}
