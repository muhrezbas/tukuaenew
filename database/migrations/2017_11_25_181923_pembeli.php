<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pembeli extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pembeli', function (Blueprint $table) {
            $table->increments('id_pembeli');
            $table->unsignedInteger('id_user');  
            $table->string('nama_pembeli');
            $table->string('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kodepos');
            $table->string('telp');
            $table->timestamps();
            $table->foreign('id_user')
            ->references('id')->on('user')
           ->onDelete()->onUpdate('cascade');
         });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembeli');
    }
}
