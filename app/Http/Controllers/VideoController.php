<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\video;
use App\jenis;
use App\kategori;
use App\subkategori;
use App\brand;
use App\transaksi;





class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $video = video::all();
        $jenis = jenis::all();
        $kategori = kategori::all();
        $subkategori = subkategori::all();
         $brand = brand::all();
        if(auth()->user()==null||auth()->user()->pembeli==null){
            $belumbayar=null;
        }

        else {
        $belumbayar = transaksi::where('id_pembeli', auth()->user()->pembeli->id_pembeli)->whereIn('status',['menunggu pembayaran','menunggu admin'])->first();
    }

         return view('layout-universal.video')->with('subkategori',$subkategori)->with('video',$video)->with('kategori',$kategori)->with('brand',$brand)->with('jenis',$jenis)->with('belumbayar',$belumbayar);
       
    }
     public function tampilkanBrand($nama_brand=null)
    {
         $jenis = jenis::all();
        $kategori = kategori::all();
        $id_video = video::join('brand','brand.id_brand','=','video.id_brand')->where('brand.id_brand',brand::where('nama_brand',$nama_brand)->first()->id_brand)->select('brand.*')->distinct()->get();
        // dd($id_video);
     $video = video::join('brand','brand.id_brand','=','video.id_brand')->where('brand.id_brand',brand::where('nama_brand',$nama_brand)->first()->id_brand)->select('video.*')->distinct()->get();
    $brand = brand::all();
    $subkategori = subkategori::all();
    if(auth()->user()==null||auth()->user()->pembeli==null){
            $belumbayar=null;
        }

        else {
        $belumbayar = transaksi::where('id_pembeli', auth()->user()->pembeli->id_pembeli)->whereIn('status',['menunggu pembayaran','menunggu admin'])->first();
    }

    return view('layout-universal.video')->with('subkategori',$subkategori)->with('video',$video)->with('kategori',$kategori)->with('brand',$brand)->with('jenis',$jenis)->with('belumbayar',$belumbayar)->with('id_video',$id_video);
    }


    // public function tampilkanVideo($id)
    // {
    // $tampilkanvideo = video::find($id);
    // return view('layout-universal.video', compact('tampilkanvideo'));
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
