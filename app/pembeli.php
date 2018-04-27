<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembeli extends Model
{
    protected $table = 'pembeli';
    protected $fillable = ['id_user', 'nama_pembeli','alamat', 'kota', 'provinsi','kodepos', 'telp'];
    protected $primaryKey = 'id_pembeli';
     
    public function user()
    {
        return $this->belongsTo('App\user', 'id_user', 'id');
    }
    public function keranjang()
    {
        return $this->hasMany('App\keranjang', 'id_pembeli', 'id_pembeli');
    }
}
