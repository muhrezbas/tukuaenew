<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fotoproduk extends Model
{
    protected $table = 'fotoproduk';
    protected $fillable = ['link_fotoproduk'];
    protected $primaryKey = 'id_fotoproduk';
     public function produk()
    {
        return $this->belongsTo('App\produk','id_produk','id_produk');
    }
}
