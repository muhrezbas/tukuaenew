<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rekening extends Model
{
    protected $table = 'rekening';
    protected $fillable = ['nominal', 'no_rek','atasnama','nama_bank'];
    protected $primaryKey = 'id_rekening';
     
    public function transaksi()
    {
        return $this->hasMany('App\pembayaran', 'id_pembayaran', 'id_pembayaran');
    }
  
}
