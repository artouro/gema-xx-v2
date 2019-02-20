<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTPeserta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_peserta', function (Blueprint $table) {
                $table->string('userid', 100)->unique();
                $table->string('password', 255);
                //1 = Admin, 2 = Panitia ,3 = peserta SD, 4 = peserta SMP, 5 = peserta SMA
                $table->integer('level'); 
                $table->string('nama');
                $table->string('pangkalan');
                $table->rememberToken();
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
        Schema::dropIfExists('t_peserta');
    }
}
