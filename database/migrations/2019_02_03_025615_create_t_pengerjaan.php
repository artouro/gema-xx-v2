<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTPengerjaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pengerjaan', function (Blueprint $table) {
            $table->increments('id_pengerjaan');
            $table->string('userid');
            $table->integer('id_matalomba');
            $table->integer('waktu_pengerjaan');
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
        Schema::dropIfExists('t_pengerjaan');
    }
}
