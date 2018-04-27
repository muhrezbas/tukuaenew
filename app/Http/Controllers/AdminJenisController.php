<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jenis;
use App\kategori;
use App\subkategori;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class AdminjenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $jenis = jenis::all();
        $kategori = kategori::all();
        $subkategori = subkategori::all();
        return view('admin.jenis.jenis')->with('jenis',$jenis)->with('kategori',$kategori)->with('subkategori',$subkategori);
    }

  public function tambah(Request $request)
    {
        
        $jenis = new jenis; // new Model
        $jenis->nama_jenis = $request->nama_jenis;
        $jenis->id_kategori = $request->id_kategori;
        


        $jenis->save();
        return redirect('jenisadmin');

       //
    }
    public function showEdit($id)
    {
        // cari data yang akan diedit
       
       $jenis = jenis::find($id);
        $kategori = kategori::where('id_subkategori',$jenis->kategori->id_subkategori)->get();
        $subkategori = subkategori::all();
        // tampilkan view beserta data yang akan diedit
        return view('admin.jenis.edit')->with('jenis',$jenis)->with('kategori',$kategori)->with('subkategori',$subkategori);
    }

    
        // proses update data
       public function postUpdate($id, Request $request)
    {  
      $jenis = jenis::find($id);
      $jenis->nama_jenis = $request->nama_jenis;
      $jenis->id_kategori = $request->id_kategori;


        $jenis->save();
        // kembali ke halaman ukuran
        return redirect('jenisadmin');//route
    }
      public function jenis($id)
    {
      
      $jenis=  jenis::where('id_kategori',$id)->get();
      return $jenis;
       //
    }


}
