<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\jenis;
use App\kategori;
use App\subkategori;
use App\brand;
use App\ukuran;
use App\transaksi;
use App\Http\Requests\validFilterBrand;
use Illuminate\Support\Facades\DB;


class ProdukController extends Controller

 {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($nama_subkategori=null,$nama_kategori=null,$nama_jenis=null)
    {   
        // dd($nama_jenis,$nama_subkategori,$nama_kategori);
        if ($nama_jenis==null && $nama_subkategori==null && $nama_kategori==null)
            {
                // $id_produk = ukuran::where('ukuran.stok_ukuran', '>' , 0)->select('id_produk')->get();
                $product = product::join('ukuran', 'ukuran.id_produk', 'produk.id_produk')->where('ukuran.stok_ukuran', '>' , 0)->select('produk.*')->distinct()->get();}
        else if($nama_jenis==null && $nama_subkategori!=null && $nama_kategori==null) { 
            $product= product::join('jenis','jenis.id_jenis','=','produk.id_jenis')->join('kategori','kategori.id_kategori','=','jenis.id_kategori')->join('subkategori','subkategori.id_subkategori','=','kategori.id_subkategori')->where('subkategori.id_subkategori',subkategori::where('nama_subkategori',$nama_subkategori)->first()->id_subkategori)->join('ukuran', 'ukuran.id_produk', 'produk.id_produk')->where('ukuran.stok_ukuran', '>' , 0)->select('produk.*')->distinct()->get();}
         else if($nama_jenis==null && $nama_subkategori!=null && $nama_kategori!=null) { 
            $id_subkategori = subkategori::where('nama_subkategori',$nama_subkategori)->first()->id_subkategori;
            $id_kategori = kategori::where('nama_kategori',$nama_kategori)->where('id_subkategori',$id_subkategori)->first()->id_kategori;
             $product= product::join('jenis','jenis.id_jenis','=','produk.id_jenis')->join('kategori','kategori.id_kategori','=','jenis.id_kategori')->where('kategori.id_kategori',$id_kategori)->join('ukuran', 'ukuran.id_produk', 'produk.id_produk')->where('ukuran.stok_ukuran', '>' , 0)->select('produk.*')->distinct()->get();}
        else {
            $id_subkategori = subkategori::where('nama_subkategori',$nama_subkategori)->first()->id_subkategori;
            $id_kategori = kategori::where('nama_kategori',$nama_kategori)->where('id_subkategori',$id_subkategori)->first()->id_kategori;
            $id_jenis = jenis::where('nama_jenis',$nama_jenis)->where('id_kategori',$id_kategori)->first()->id_jenis;  
            $product= product::where('id_jenis',$id_jenis)-> join('ukuran', 'ukuran.id_produk', 'produk.id_produk')->where('ukuran.stok_ukuran', '>' , 0)->select('produk.*')->distinct()->get();}

        $jenis = jenis::all();
        $kategori = kategori::all();
        $brand = brand::all();
        $subkategori = subkategori::all();
       
       if(auth()->user()==null||auth()->user()->pembeli==null){
            $belumbayar=null;
        }

        else {
        $belumbayar = transaksi::where('id_pembeli', auth()->user()->pembeli->id_pembeli)->whereIn('status',['menunggu pembayaran','menunggu admin'])->first();
    }

        return view('layout-universal.content')->with('kategori',$kategori)->with('product',$product)->with('jenis',$jenis)->with('subkategori',$subkategori)->with('brand',$brand)->with('belumbayar',$belumbayar);
    }
   

    public function tampilkanProduk($id)
    {
         $jenis = jenis::all();
        $kategori = kategori::all();
    $tampilkan = ukuran::where('id_produk',$id)->where('ukuran.stok_ukuran', '>' , 0)->get();
    $brand = brand::all();
    $subkategori = subkategori::all();
     $like= product::join('jenis','jenis.id_jenis','=','produk.id_jenis')->join('kategori','kategori.id_kategori','=','jenis.id_kategori')->join('subkategori','subkategori.id_subkategori','=','kategori.id_subkategori')->join('ukuran', 'ukuran.id_produk', 'produk.id_produk')->where('ukuran.stok_ukuran', '>' , 0)->where('subkategori.id_subkategori',product::find($id)->jenis->kategori->id_subkategori)->whereNotIn('produk.id_produk',[$id])->select('produk.*')->inRandomOrder()->limit(3)->distinct()->get();
     if(auth()->user()==null||auth()->user()->pembeli==null){
            $belumbayar=null;
        }

        else {
        $belumbayar = transaksi::where('id_pembeli', auth()->user()->pembeli->id_pembeli)->whereIn('status',['menunggu pembayaran','menunggu admin'])->first();
    }


    return view('layout-universal.product')->with('kategori',$kategori)->with('tampilkan',$tampilkan)->with('jenis',$jenis)->with('subkategori',$subkategori)->with('brand',$brand)->with('belumbayar',$belumbayar)->with('like',$like);
    }

     public function filterBrand(Request $request )
    {
         $jenis = jenis::all();
        $kategori = kategori::all();
     $product = product::join('ukuran', 'ukuran.id_produk', 'produk.id_produk')->where('ukuran.stok_ukuran', '>' , 0)->whereIn('id_brand',$request->brand)->select('produk.*')->distinct()->get();
    $brand = brand::all();
    $subkategori = subkategori::all();
    if(auth()->user()==null||auth()->user()->pembeli==null){
            $belumbayar=null;
        }

        else {
        $belumbayar = transaksi::where('id_pembeli', auth()->user()->pembeli->id_pembeli)->whereIn('status',['menunggu pembayaran','menunggu admin'])->first();
    }
    return view('layout-universal.content')->with('kategori',$kategori)->with('product',$product)->with('jenis',$jenis)->with('subkategori',$subkategori)->with('brand',$brand)->with('belumbayar',$belumbayar);
    }

      public function tampilkanBrand($nama_brand=null)
    {
         $jenis = jenis::all();
        $kategori = kategori::all();
        $id_produk = product::join('brand','brand.id_brand','=','produk.id_brand')->where('brand.id_brand',brand::where('nama_brand',$nama_brand)->first()->id_brand)->select('brand.*')->distinct()->get();
        // dd($id_produk);
     $product = product::join('brand','brand.id_brand','=','produk.id_brand')->where('brand.id_brand',brand::where('nama_brand',$nama_brand)->first()->id_brand)->join('ukuran', 'ukuran.id_produk', 'produk.id_produk')->where('ukuran.stok_ukuran', '>' , 0)->select('produk.*')->distinct()->get();
    $brand = brand::all();
    $subkategori = subkategori::all();
    if(auth()->user()==null||auth()->user()->pembeli==null){
            $belumbayar=null;
        }

        else {
        $belumbayar = transaksi::where('id_pembeli', auth()->user()->pembeli->id_pembeli)->whereIn('status',['menunggu pembayaran','menunggu admin'])->first();
    }

    return view('layout-universal.brand')->with('kategori',$kategori)->with('product',$product)->with('jenis',$jenis)->with('subkategori',$subkategori)->with('brand',$brand)->with('belumbayar',$belumbayar)->with('id_produk',$id_produk);
    }
     public function search(Request $request)
    {
        if($request->search==null){
            return redirect()->back();
        }

         $jenis = jenis::all();
        $kategori = kategori::all();
     $product = product::join('brand','brand.id_brand','=','produk.id_brand')->where('nama_brand','like','%'.$request->search.'%')->orWhere('nama_produk','like','%'.$request->search.'%')->join('ukuran', 'ukuran.id_produk', 'produk.id_produk')->where('ukuran.stok_ukuran', '>' , 0)->select('produk.*')->distinct()->get();
    $brand = brand::all();
    $subkategori = subkategori::all();
    if(auth()->user()==null||auth()->user()->pembeli==null){
            $belumbayar=null;
        }

        else {
        $belumbayar = transaksi::where('id_pembeli', auth()->user()->pembeli->id_pembeli)->whereIn('status',['menunggu pembayaran','menunggu admin'])->first();
    }

    return view('layout-universal.content')->with('kategori',$kategori)->with('product',$product)->with('jenis',$jenis)->with('subkategori',$subkategori)->with('brand',$brand)->with('belumbayar',$belumbayar);
    }


    
}
