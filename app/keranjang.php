<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    protected $table = 'keranjang';
    protected $fillable = ['id_pembeli', 'id_ukuran','jumlah'];
    protected $primaryKey = 'id_keranjang';
     
    public function ukuran()
    {
        return $this->belongsTo('App\ukuran', 'id_ukuran', 'id_ukuran');
    }
    public function pembeli()
    {
        return $this->belongsTo('App\pembeli', 'id_pembeli', 'id_pembeli');
    }

    public function total($id_pembeli)
    {
        $keranjang = $this->where('id_pembeli', $id_pembeli)->get();
        $total = 0;
        foreach ($keranjang as $key => $value) {
            $total = $total + $value->jumlah * $value->ukuran->produk->harga;
        }
        return $total;
    }

     public function totalDiskon($id_pembeli)
    {
        $keranjang = $this->where('id_pembeli', $id_pembeli)->join('ukuran', 'ukuran.id_ukuran', 'keranjang.id_ukuran')->join('produk', 'produk.id_produk', 'ukuran.id_produk')->get();
        $diskon = 0;
        foreach ($keranjang as $key => $value) {
             if($value->kelipatanpotongan!=null||$value->kelipatanpotongan!=0){
            $potonganAwal = $value->jumlah - $value->startpotongan;
            if($potonganAwal >= 0){
                $diskonProduk = (floor($potonganAwal/$value->kelipatanpotongan)+1)*$value->potonganharga/100*$value->harga;
                $diskon = $diskon + $diskonProduk;
            }
        }
    }
        return $diskon;
    }
     public function diskon($id_keranjang)
    {
        $keranjang = $this->where('id_keranjang', $id_keranjang)->join('ukuran', 'ukuran.id_ukuran', 'keranjang.id_ukuran')->join('produk', 'produk.id_produk', 'ukuran.id_produk')->first();
            $diskonProduk=0;
            if($keranjang->kelipatanpotongan!=null||$keranjang->kelipatanpotongan!=0){
            $potonganAwal = $keranjang->jumlah - $keranjang->startpotongan;
            if($potonganAwal >= 0){
                $diskonProduk = (floor($potonganAwal/$keranjang->kelipatanpotongan)+1)*$keranjang->potonganharga/100*$keranjang->harga;
            }
        }
        return $diskonProduk;
    }
}
