<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Keranjang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keranjang', function (Blueprint $table) {
            $table->increments('id_keranjang');
            $table->unsignedInteger('id_pembeli');  
            $table->unsignedInteger('id_ukuran');  
            $table->integer('jumlah');
            $table->timestamps();
            $table->foreign('id_ukuran')
            ->references('id_ukuran')->on('ukuran')
           ->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('id_pembeli')
            ->references('id_pembeli')->on('pembeli')
           ->onDelete()->onUpdate();
         });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keranjang');
    }
}
