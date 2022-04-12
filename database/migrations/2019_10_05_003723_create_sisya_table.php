<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSisyaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sisya', function (Blueprint $table) { //buat table pd database
            $table->bigIncrements('id');
            $table->string('nama_bapak');
            $table->string('pekerjaan_bapak');
            $table->string('nik_bapak');
            $table->string('nohp_bapak');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('nik_ibu');
            $table->string('nohp_ibu');
            $table->text('alamat');
            $table->string('tingkat');
            $table->string('kabupaten');
            $table->string('provinsi');
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
        Schema::dropIfExists('sisya');
    }
}
