<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('image_url')->nullable();
            $table->string('title');
            $table->string('url')->nullable();
            $table->integer('age_begin');
            $table->integer('age_end');
            $table->integer('activitytype_id');
            $table->boolean('publish')->default(0);
            $table->text('body');
            $table->text('body_small');
            $table->text('body_medium');
            $table->integer('state_id')->default(1);
            $table->text('reason_for_revise')->nullable();
            $table->string('material');
            $table->integer('like')->default(0);
            $table->integer('dislike')->default(0);
            $table->integer('hit')->default(0);
            $table->timestamps();
            $table->dateTime('approved_at');
        });
        Schema::create('activity_like', function (Blueprint $table) {
        
            $table->integer('activity_id');
            $table->integer('user_id');
            $table->primary(['activity_id','user_id']);
        });

        Schema::create('activity_dislike', function (Blueprint $table) {
        
            $table->integer('activity_id');
            $table->integer('user_id');
            $table->primary(['activity_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');

        Schema::dropIfExists('activity_like');
        Schema::dropIfExists('activity_dislike');
    }
}
