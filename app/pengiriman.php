<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengiriman extends Model
{
    protected $table = 'pengiriman';
    protected $fillable = ['id_transaksi', 'tanggal','berat', 'alamat', 'kota', 'provinsi','kodepos'];
    protected $primaryKey = 'id_pengiriman';
     
    public function transaksi()
    {
        return $this->belongsTo('App\transaksi', 'id_transaksi', 'id_transaksi');
    }
}
