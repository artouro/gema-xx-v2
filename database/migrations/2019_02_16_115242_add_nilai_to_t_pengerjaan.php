<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNilaiToTPengerjaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_pengerjaan', function (Blueprint $table) {
            $table->integer('nilai')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_pengerjaan', function (Blueprint $table) {
            $table->dropColumn('nilai');
        });
    }
}
