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
            $table->increments('id');
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->integer('level'); //1 = Admin, 2 = Panitia ,3 = peserta SD, 4 = peserta SMP, 5 = peserta SMA
            $table->string('nama');
            $table->string('pangkalan');
            $table->integer('lkbb')->nullable();
            $table->string('telp');
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
