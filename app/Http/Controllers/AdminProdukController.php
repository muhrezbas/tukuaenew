<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jenis;
use App\kategori;
use App\product;
use App\fotoproduk;
use App\brand;
use App\subkategori;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\validProdukAdmin;


class AdminprodukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = product::all();
        $jenis = jenis::all();
        $kategori = kategori::all();
        $subkategori = subkategori::all();
        $brand = brand::all();

        return view('admin.produk.produk')->with('kategori',$kategori)->with('produk',$produk)->with('jenis',$jenis)->with('brand',$brand)->with('subkategori',$subkategori);
    }

  public function tambah(validProdukAdmin $request)
    {
    
        $produk = new product; // new Model
        $produk->nama_produk = $request->nama_produk;
        $produk->id_jenis = $request->id_jenis;
        $produk->id_brand = $request->id_brand;
        $produk->warna = $request->warna;
        $produk->detail_produk = $request->detail_produk;
        $produk->berat = $request->berat;
        $produk->harga = $request->harga;
        $produk->potonganharga = $request->potonganharga;
        $produk->startpotongan = $request->startpotongan;
        $produk->kelipatanpotongan = $request->kelipatanpotongan;
        


        $produk->save();
        foreach ($request -> link_fotoproduk as $nofoto => $link) {
         $fotoproduk = new fotoproduk;
         $fotoproduk -> link_fotoproduk=$link;
         $fotoproduk -> id_produk = $produk->id_produk;
         $fotoproduk->save();
        }
        return redirect('produkadmin');

       //
    }
    public function showEdit($id)
    {
        // cari data yang akan diedit
       
       $produk = product::find($id);
        $jenis = jenis::where('id_kategori',$produk->jenis->id_kategori)->get();
        $subkategori = subkategori::all();
         $brand = brand::all();
        $kategori = kategori::where('id_subkategori',$produk->jenis->kategori->id_subkategori)->get();
        // tampilkan view beserta data yang akan diedit
        return view('admin.produk.edit')->with('kategori',$kategori)->with('produk',$produk)->with('jenis',$jenis)->with('subkategori',$subkategori)->with('brand',$brand);
    }

    
        // proses update data
       public function postUpdate($id, validProdukAdmin $request)
    {  
      $produk = product::find($id);
      $produk->nama_produk = $request->nama_produk;
        $produk->id_jenis = $request->id_jenis;
        $produk->warna = $request->warna;
        $produk->detail_produk = $request->detail_produk;
        $produk->berat = $request->berat;
        $produk->harga = $request->harga;
         $produk->potonganharga = $request->potonganharga;
        $produk->startpotongan = $request->startpotongan;
        $produk->kelipatanpotongan = $request->kelipatanpotongan;
        $produk->id_brand = $request->id_brand;


         $produk->save();
        foreach ($request -> link_fotoproduk as $nofoto => $link) {
        if($request->id_fotoproduk[$nofoto]!=NULL){
         $fotoproduk = fotoproduk::find($request->id_fotoproduk[$nofoto]);

         $fotoproduk -> link_fotoproduk=$link;
         $fotoproduk -> id_produk = $produk->id_produk;
         $fotoproduk->save();
     }
        else {
             $fotoproduk = new fotoproduk;
         $fotoproduk -> link_fotoproduk=$link;
         $fotoproduk -> id_produk = $produk->id_produk;
         $fotoproduk->save();
        }
        }
        
        fotoproduk::where('id_produk',$id)->whereNotIn('id_fotoproduk',$request->id_fotoproduk)->delete();
       
        // kembali ke halaman ukuran
        return redirect('produkadmin');//route
    }

}
