<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subkategori;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class AdminSubkategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $subkategori = subkategori::all();
        return view('admin.subkategori.subkategori')->with('subkategori',$subkategori);
    }

  public function tambah(Request $request)
    {
        
        $subkategori = new subkategori; // new Model
        $subkategori->nama_subkategori = $request->nama_subkategori;
        
   
        
       


        $subkategori->save();
        return redirect('subkategoriadmin');

       //
    }
    public function showEdit($id)
    {
        // cari data yang akan diedit
       
       $subkategori = subkategori::find($id);
        // tampilkan view beserta data yang akan diedit
        return view('admin.subkategori.edit')->with('subkategori',$subkategori);
    }

    
        // proses update data
       public function postUpdate($id, Request $request)
    {  
      $subkategori = subkategori::find($id);
      $subkategori->nama_subkategori = $request->nama_subkategori;



        $subkategori->save();
        // kembali ke halaman ukuran
        return redirect('subkategoriadmin');//route
    }

  
}
