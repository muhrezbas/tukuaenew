<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Fotoproduk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotoproduk', function (Blueprint $table) {
            $table->increments('id_fotoproduk');
            $table->string('link_fotoproduk');
            $table->unsignedInteger('id_produk');
            $table->foreign('id_produk')
            ->references('id_produk')->on('produk')
           ->onDelete('cascade')->onUpdate('cascade');        
            

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
       Schema::dropIfExists('fotoproduk');
    }
}
