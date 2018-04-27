<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subkategori extends Model
{
    protected $table = 'subkategori';
    protected $fillable = ['nama_subkategori'];
    protected $primaryKey = 'id_subkategori';
    public function kategori()
    {
        return $this->hasMany('App\kategori', 'id_subkategori', 'id_subkategori');
    }
     public function getProduk($id_subkategori){  
        $total = $this->join('kategori','subkategori.id_subkategori','=','kategori.id_subkategori')->join('jenis','kategori.id_kategori','=','jenis.id_kategori')->join('produk','jenis.id_jenis','=','produk.id_jenis')->join('ukuran','ukuran.id_produk','produk.id_produk')->where('subkategori.id_subkategori', $id_subkategori)->where('ukuran.stok_ukuran','>',0)->distinct()->count('produk.id_produk');
        return $total;
    }
}
