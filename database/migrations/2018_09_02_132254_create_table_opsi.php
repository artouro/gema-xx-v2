<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOpsi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_opsi', function(Blueprint $table){
            $table->increments('id_opsi', 10);
            $table->integer('id_soal')->unsigned();
            $table->integer('opsi_ke');
            $table->text('teks_opsi');
            $table->timestamps();
            $table->foreign('id_soal')
                  ->references('id_soal')->on('t_soal')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_opsi');
    }
}
