<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('commentable_id');
            $table->string('commentable_type');
            $table->integer('like')->default(0);
            $table->integer('dislike')->default(0);
            $table->string('active')->default(1);
            $table->integer('inapropriate_flag')->default(0);
            $table->string('reason_for_inapropriate_flag')->nullable();
            $table->string('reason_for_inactivation')->nullable();
            $table->text('body');
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
        Schema::dropIfExists('comments');
    }
}
