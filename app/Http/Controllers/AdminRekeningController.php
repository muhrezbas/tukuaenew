<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rekening;
use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Http\Requests\validRekeningAdmin;
class AdminRekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $rekening = rekening::all();
        return view('admin.rekening.rekening')->with('rekening',$rekening);
    }

  public function tambah(validRekeningAdmin $request)
    {
        
        $rekening = new rekening; // new Model
        $rekening->nama_bank = $request->nama_bank;
        $rekening->atasnama = $request->atasnama;
        $rekening->no_rek = $request->no_rek;
        $rekening->save();
        return redirect('rekeningadmin');

       //
    }
    public function showEdit($id)
    {
        // cari data yang akan diedit
       
       $rekening = rekening::find($id);
        // tampilkan view beserta data yang akan diedit
        return view('admin.rekening.edit')->with('rekening',$rekening);
    }

    
        // proses update data
       public function postUpdate($id, validRekeningAdmin $request)
    {  
      $rekening = rekening::find($id);
     $rekening->nama_bank = $request->nama_bank;
        $rekening->atasnama = $request->atasnama;
        $rekening->no_rek = $request->no_rek;



        $rekening->save();
        // kembali ke halaman ukuran
        return redirect('rekeningadmin');//route
    }

  
}
