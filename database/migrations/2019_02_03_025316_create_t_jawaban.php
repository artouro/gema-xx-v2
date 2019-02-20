<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTJawaban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_jawaban', function (Blueprint $table) {
            $table->increments('id_jawaban');
            $table->integer('id_pengerjaan');
            $table->integer('id_soal');
            $table->string('jawaban_peserta');
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
        Schema::dropIfExists('t_jawaban');
    }
}
