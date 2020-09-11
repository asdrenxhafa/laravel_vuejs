<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('user_id');
            $table->text('body');
            $table->integer('votes_count')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('user_id')->references('id')->on('users');

//            $table->id();
//            $table->unsignedInteger('question_id');
//            $table->unsignedInteger('user_id');
//            $table->text('body');
//            $table->integer('votes_count')->default(0);
//            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');


        Schema::dropIfExists('answers');
    }
}
