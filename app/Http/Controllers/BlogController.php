<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\jenis;
use App\kategori;
use App\subkategori;
use App\brand;
use App\transaksi;




class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();
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


        return view('layout-universal.blogmedium')->with('subkategori',$subkategori)->with('blog',$blog)->with('kategori',$kategori)->with('brand',$brand)->with('jenis',$jenis)->with('belumbayar',$belumbayar);
    }
    public function tampilkanBrand($nama_brand=null)
    {
         $jenis = jenis::all();
        $kategori = kategori::all();
        $id_blog = Blog::join('brand','brand.id_brand','=','blog.id_brand')->where('brand.id_brand',brand::where('nama_brand',$nama_brand)->first()->id_brand)->select('brand.*')->distinct()->get();
        // dd($id_blog);
     $blog = Blog::join('brand','brand.id_brand','=','blog.id_brand')->where('brand.id_brand',brand::where('nama_brand',$nama_brand)->first()->id_brand)->select('blog.*')->distinct()->get();
    $brand = brand::all();
    $subkategori = subkategori::all();
    if(auth()->user()==null||auth()->user()->pembeli==null){
            $belumbayar=null;
        }

        else {
        $belumbayar = transaksi::where('id_pembeli', auth()->user()->pembeli->id_pembeli)->whereIn('status',['menunggu pembayaran','menunggu admin'])->first();
    }

    return view('layout-universal.blogmedium')->with('subkategori',$subkategori)->with('blog',$blog)->with('kategori',$kategori)->with('brand',$brand)->with('jenis',$jenis)->with('belumbayar',$belumbayar)->with('id_blog',$id_blog);
    }

    public function tampilkanBlog($id)
    {
    $tampilkanblog = Blog::find($id);
    $subkategori = subkategori::all();
    $jenis = jenis::all();
        $kategori = kategori::all();
        $brand = brand::all();
         if(auth()->user()==null||auth()->user()->pembeli==null){
            $belumbayar=null;
        }

        else {
        $belumbayar = transaksi::where('id_pembeli', auth()->user()->pembeli->id_pembeli)->whereIn('status',['menunggu pembayaran','menunggu admin'])->first();
    }
    return view('layout-universal.blog')->with('subkategori',$subkategori)->with('tampilkanblog',$tampilkanblog)->with('kategori',$kategori)->with('brand',$brand)->with('jenis',$jenis)->with('belumbayar',$belumbayar);
    }
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
