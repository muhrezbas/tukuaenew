<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['id_pembeli','kode','tanggal','total_harga', 'status','diskon'];
    protected $primaryKey = 'id_transaksi';
     public function detail_transaksi()
    {
        return $this->hasMany('App\detail_transaksi','id_transaksi','id_transaksi');
    }
    public function pengiriman()
    {
        return $this->hasOne('App\pengiriman', 'id_transaksi', 'id_transaksi');
    }
    public function pembeli()
    {
        return $this->belongsTo('App\pembeli', 'id_pembeli', 'id_pembeli');
    }
     public function rekening()
    {
        return $this->belongsTo('App\rekening', 'id_rekening', 'id_rekening');
    }
    public function rating()
    {
        return $this->hasMany('App\rating','id_transaksi','id_transaksi');
    }
    public function getBrand($id_transaksi){  
       $brands = $this->join('detail_transaksi','detail_transaksi.id_transaksi','=','transaksi.id_transaksi')->join('ukuran','ukuran.id_ukuran','=','detail_transaksi.id_ukuran')->join('produk','ukuran.id_produk','=','produk.id_produk')->join('brand','brand.id_brand','produk.id_brand')->where('transaksi.id_transaksi', $id_transaksi)->select('brand.*')->distinct()->get();
        return $brands;
    }
    



   
}
