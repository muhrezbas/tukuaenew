<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $fillable = ['id_transaksi', 'id_ukuran','jumlah', 'total_harga'];
    protected $primaryKey = 'id_detail_transaksi';
     
    public function transaksi()
    {
        return $this->belongsTo('App\transaksi', 'id_transaksi', 'id_transaksi');
    }
    public function ukuran()
    {
        return $this->belongsTo('App\ukuran', 'id_ukuran', 'id_ukuran');
    }
}
