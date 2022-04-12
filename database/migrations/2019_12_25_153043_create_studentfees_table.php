<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentfeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentfees', function (Blueprint $table) {
            $table->increments('student_fee_id');
            $table->integer('fee_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('level_id')->unsigned();
            $table->float('amount');
            $table->foreign('fee_id')->references('fee_id')->on('fees');
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('level_id')->references('level_id')->on('levels');
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
        Schema::dropIfExists('studentfees');
    }
}
