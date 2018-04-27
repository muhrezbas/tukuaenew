<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blog';

    protected $fillable = ['judul_blog','penulis','created_at','deskripsi_artikel','artikel','buatsiapa','thumbnail'];
    protected $primaryKey = 'id_blog';
    public function brand()
    {
        return $this->belongsTo('App\brand', 'id_brand', 'id_brand');
    }
}
