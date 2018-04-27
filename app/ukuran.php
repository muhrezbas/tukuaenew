<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ukuran extends Model
{
    protected $table = 'ukuran';
    protected $fillable = ['nama_ukuran'];
    protected $primaryKey = 'id_ukuran';
     public function produk()
    {
        return $this->belongsTo('App\product','id_produk','id_produk');
    }
    public function keranjang()
    {
        return $this->hasMany('App\keranjang', 'id_ukuran', 'id_ukuran');
    }
    public function detail_transaksi()
    {
        return $this->hasMany('App\pengiriman', 'id_ukuran', 'id_ukuran');
    }
     public function getProduk($id_subkategori){  
        $total = $this->join('produk','ukuran.id_produk','produk.id_produk')->join('jenis','jenis.id_jenis','=','produk.id_jenis')->join('kategori','kategori.id_kategori','=','jenis.id_kategori')->join('subkategori','subkategori.id_subkategori','=','kategori.id_subkategori')->where('id_subkategori', $id_subkategori)->where('ukuran.stok_ukuran','>',0)->distinct()->count('produk.id_produk');
        return $total;
    }
}
