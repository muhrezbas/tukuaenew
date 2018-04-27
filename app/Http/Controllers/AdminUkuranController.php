<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ukuran;
use App\product;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\validStok;
class AdminUkuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ukuran = ukuran::all();
        $produk = product::all();
        return view('admin.ukuran.ukuran')->with('ukuran',$ukuran)->with('produk',$produk);
    }

  public function tambah(validStok $request)
    {
        
        $ukuran = new ukuran; // new Model
        $ukuran->nama_ukuran = $request->nama_ukuran;
        $ukuran->stok_ukuran = $request->stok_ukuran;
        $ukuran->id_produk = $request->id_produk;
      
   
        
       


        $ukuran->save();
   

        return redirect('ukuran');

       //
    }
    public function showEdit($id)
    {
        // cari data yang akan diedit
       
       $ukuran = ukuran::find($id);
        $produk = product::all();
        // tampilkan view beserta data yang akan diedit
        return view('admin.ukuran.edit')->with('ukuran',$ukuran)->with('produk',$produk);
    }

    
        // proses update data
       public function postUpdate($id, validStok $request)
    {  
         $ukuran = ukuran::find($id);
             $ukuran->nama_ukuran = $request->nama_ukuran;
        $ukuran->stok_ukuran = $request->stok_ukuran;
        $ukuran->id_produk = $request->id_produk;



        $ukuran->save();
        // kembali ke halaman ukuran
        return redirect('ukuran');//route
    }

}
