<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('student_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->boolean('sex');
            $table->date('birth');
            $table->string('status');
            $table->string('phone');
            $table->string('village');
            $table->string('district');
            $table->string('province');
            $table->string('current_address')->nullable();
            $table->date('dateregistered');
            $table->integer('user_id')->unsigned();
            $table->string('photo')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('students');
    }
}
