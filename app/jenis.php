<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis extends Model
{
    protected $table = 'jenis';
    protected $fillable = ['nama_jenis'];
    protected $primaryKey = 'id_jenis';
    public function product()
    {
        return $this->hasMany('App\product', 'id_jenis', 'id_jenis');
    }
     public function kategori()
    {
        return $this->belongsTo('App\kategori', 'id_kategori', 'id_kategori');
    }

}
