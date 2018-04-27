<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $fillable = ['id_transaksi', 'tanggal','bukti', 'id_rekening', 'nominal', 'rekening_pembeli','atas_nama_pembeli','bank_pembeli','status'];
    protected $primaryKey = 'id_pembayaran';
     
    public function transaksi()
    {
        return $this->belongsTo('App\transaksi', 'id_transaksi', 'id_transaksi');
    }

    public function setBuktiAttribute($value)
    {

        $attribute_name = "bukti";
        $disk = "public";
        $destination_path = "uploads/bukti";

        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->image);

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image'))
        {
            // 0. Make the image
            $image = \ImageIn::make($value);
            $image->resize(300, 300);
            // 1. Generate a filename.

            $filename = md5($value.time()).'.jpg';
           
            
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $destination_path.'/'.$filename;
        }
    }
   
}
