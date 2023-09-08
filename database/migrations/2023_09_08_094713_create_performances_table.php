<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->timestamps();
        });
        Schema::create('performance_results', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('performance_id')->unsigned()->default(0);
            $table->foreign('performance_id')->references('id')->on('performances')->onDelete('cascade');
			$table->integer('question_id')->unsigned()->default(0);
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->integer('answer_id')->unsigned()->default(0);
			$table->foreign('answer_id')->references('id')->on('answers')->onDelete('cascade');
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
        Schema::dropIfExists('performances');
        Schema::dropIfExists('performance_results');
    }
}
