<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brand;
use App\rating;
use App\transaksi;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class AdminbrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $brand = brand::all();
        return view('admin.brand.brand')->with('brand',$brand);
    }

  public function tambah(Request $request)
    {
        
        $brand = new brand; // new Model
        $brand->nama_brand = $request->nama_brand;
        $brand->informasi_brand = $request->informasi_brand;
     
   
        
       


        $brand->save();
         
   

        return redirect('brandadmin');

       //
    }
    public function showEdit($id)
    {
        // cari data yang akan diedit
       
       $brand = brand::find($id);
        // tampilkan view beserta data yang akan diedit
        return view('admin.brand.edit')->with('brand',$brand);
    }

    
        // proses update data
       public function postUpdate($id, Request $request)
    {  
      $brand = brand::find($id);
      $brand->nama_brand = $request->nama_brand;
      $brand->informasi_brand = $request->informasi_brand;

        $brand->save();
       foreach ($request ->rating as $norating => $nilairating) {
         
         $rating = rating::find($request->id_rating[$norating]);
 
         $rating ->rating=$nilairating;
         $rating->feedback= $request->feedback[$norating];


         $rating->id_brand = $brand->id_brand;
     
         $rating->save();
   
    }
    

      // $brand->rating = $request->rating;



        // kembali ke halaman ukuran
        return redirect('brandadmin');//route
    }

}
