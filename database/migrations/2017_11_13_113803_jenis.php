<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Jenis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis', function (Blueprint $table) {
            $table->increments('id_jenis');
            $table->string('nama_jenis');
            $table->unsignedInteger('id_kategori');            
            $table->timestamps();
            $table->foreign('id_kategori')
            ->references('id_kategori')->on('kategori')
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
        Schema::dropIfExists('jenis');
    }
}
