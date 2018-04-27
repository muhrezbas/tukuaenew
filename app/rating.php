<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    protected $table = 'rating';
    protected $fillable = ['rating','feedback'];
    protected $primaryKey = 'id_rating';
     public function brand()
    {
        return $this->belongsTo('App\brand','id_brand','id_brand');
    }
    public function transaksi()
    {
        return $this->belongsTo('App\transaksi','id_transaksi','id_transaksi');
    }


}
