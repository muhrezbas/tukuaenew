<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = 'brand';
    protected $fillable = ['nama_brand','rating'];
    protected $primaryKey = 'id_brand';
     public function produk()
    {
        return $this->hasMany('App\product','id_brand','id_brand');
    }
    public function rating()
    {
        return $this->hasMany('App\rating', 'id_brand', 'id_brand');
    }

    public function getRatarata($id_brand){  
        $ratings = $this->find($id_brand)->rating()->avg('rating');
        return $ratings;
    }
      public function blog()
    {
        return $this->hasMany('App\Blog','id_brand','id_brand');
    }
     public function video()
    {
        return $this->hasMany('App\video','id_brand','id_brand');
    }
}
