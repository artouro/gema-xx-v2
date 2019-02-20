<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdPengerjaanToTJawaban2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_jawaban2', function (Blueprint $table) {
            $table->dropColumn('userid');
            $table->dropColumn('id_matalomba');
            $table->integer('id_pengerjaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_jawaban2', function (Blueprint $table) {
            $table->string('userid');
            $table->integer('id_matalomba');
            $table->dropColumn('id_pengerjaan');
        });
    }
}
