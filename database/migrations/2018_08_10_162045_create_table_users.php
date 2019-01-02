<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_users', function (Blueprint $table){
            $table->string('userid', 50)->unique();
            $table->string('password', 255);
            $table->integer('level'); //1 = Admin, 2 = Panitia ,3 = peserta SD, 4 = peserta SMP, 5 = peserta SMA
            $table->string('nama');
            $table->string('gender');
            $table->string('pangkalan');
            $table->string('email_pinru');
            $table->string('telp_pinru');
            $table->string('email_pembina');
            $table->string('telp_pembina');
            $table->string('no_peserta');
            $table->integer('aktif');
            $table->integer('bukti_pembayaran');
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
        Schema::dropIfExists('t_users');
    }
}
