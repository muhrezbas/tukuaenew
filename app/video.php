<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class video extends Model
{
    protected $table = 'video';

    protected $fillable = ['judul_video','pembuat','created_at','link_video','sourcevideo','deskripsi'];
    protected $primaryKey = 'id_video';
    public function brand()
    {
        return $this->belongsTo('App\brand', 'id_brand', 'id_brand');
    }
}
