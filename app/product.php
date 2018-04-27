<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'produk';
    protected $fillable = ['nama_produk', 'warna','detail_produk','foto','berat','harga','id_brand'];
    protected $primaryKey = 'id_produk';
     public function jenis()
    {
        return $this->belongsTo('App\jenis','id_jenis','id_jenis');
    }
    public function fotoproduk()
    {
        return $this->hasMany('App\fotoproduk', 'id_produk', 'id_produk');
    }
    public function brand()
    {
        return $this->belongsTo('App\brand', 'id_brand', 'id_brand');
    }
    public function ukuran()
    {
        return $this->hasMany('App\ukuran', 'id_produk', 'id_produk');
    }
   public function getTotal($id_brand){  
        $total = $this->join('ukuran','ukuran.id_produk','produk.id_produk')->where('id_brand', $id_brand)->where('ukuran.stok_ukuran','>',0)->distinct()->count('produk.id_produk');
        return $total;
    }
   
}
