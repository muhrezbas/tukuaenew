<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Produk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
   {
        Schema::create('produk', function (Blueprint $table) {
            $table->increments('id_produk');
            $table->unsignedInteger('id_jenis');  
            $table->unsignedInteger('id_brand');  
            $table->string('nama_produk');
            $table->string('warna');
            $table->string('detail_produk');
            $table->double('berat',4,2);
            $table->integer('harga');
            $table->timestamps();
            $table->foreign('id_jenis')
            ->references('id_jenis')->on('jenis')
           ->onDelete()->onUpdate('cascade');
           $table->foreign('id_brand')
            ->references('id_brand')->on('brand')
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
        Schema::dropIfExists('produk');
    }
}
