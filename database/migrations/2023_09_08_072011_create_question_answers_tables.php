<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionAnswersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
			$table->string('question');
            $table->timestamps();
        });
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('question_id')->unsigned()->default(0);
			$table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
			$table->string('answers');
            $table->tinyInteger('order')->default(0);
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
        Schema::dropIfExists('questions');
        Schema::dropIfExists('answers');
    }
}
