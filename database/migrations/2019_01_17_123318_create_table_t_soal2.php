<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTSoal2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_soal2', function (Blueprint $table) {
            $table->increments('id_soal2');
            $table->integer('id_matalomba')->unsigned();
            $table->string('kata_1')->nullable();
            $table->string('kata_2')->nullable();
            $table->string('kata_3')->nullable();
            $table->string('kata_4')->nullable();
            $table->string('kata_5')->nullable();
            $table->string('kata_6')->nullable();
            $table->string('kata_7')->nullable();
            $table->string('kata_8')->nullable();
            $table->string('kata_9')->nullable();
            $table->string('kata_10')->nullable();
            $table->timestamps();
            $table->foreign('id_matalomba')
                  ->references('id_matalomba')
                  ->on('t_matalomba')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_t_soal2');
    }
}
