<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori','subkategori'];
    protected $primaryKey = 'id_kategori';
    public function jenis()
    {
        return $this->hasMany('App\jenis', 'id_kategori', 'id_kategori');
    }
    public function subkategori()
    {
        return $this->belongsTo('App\subkategori', 'id_subkategori', 'id_subkategori');
    }
}
