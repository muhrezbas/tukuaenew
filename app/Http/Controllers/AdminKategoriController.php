<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kategori;
use App\subkategori;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class AdminKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kategori = kategori::all();
        $subkategori = subkategori::all();
        return view('admin.kategori.kategori')->with('kategori',$kategori)->with('subkategori',$subkategori);
    }

  public function tambah(Request $request)
    {
        
        $kategori = new kategori; // new Model
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->id_subkategori = $request->id_subkategori;
        
       


        $kategori->save();
        return redirect('kategoriadmin');

       //
    }
    public function showEdit($id)
    {
        // cari data yang akan diedit
       
       $kategori = kategori::find($id);
       $subkategori = subkategori::all();
        // tampilkan view beserta data yang akan diedit
        return view('admin.kategori.edit')->with('kategori',$kategori)->with('subkategori',$subkategori);
    }

    
        // proses update data
       public function postUpdate($id, Request $request)
    {  
      $kategori = kategori::find($id);
      $kategori->nama_kategori = $request->nama_kategori;
      $kategori->id_subkategori = $request->id_subkategori;


        $kategori->save();
        // kembali ke halaman ukuran
        return redirect('kategoriadmin');//route
    }
    public function kategori($id)
    {
      
      $kategori=  kategori::where('id_subkategori',$id)->get();
      return $kategori;
       //
    }

  
}
