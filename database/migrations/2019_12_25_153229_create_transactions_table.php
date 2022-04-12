<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('transact_id');
            $table->datetime('transact_date');
            $table->integer('fee_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->integer('student_fee_id')->unsigned();
            $table->float('paid');
            $table->string('remark')->nullable();
            $table->string('description')->nullable();
            $table->foreign('fee_id')->references('fee_id')->on('fees');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('student_id')->references('student_id')->on('students');
           
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
        Schema::dropIfExists('transactions');
    }
}
