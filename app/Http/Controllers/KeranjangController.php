<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jenis;
use App\kategori;
use App\keranjang;
use App\product;
use App\fotoproduk;
use App\brand;
use App\ukuran;
use App\pembeli;
use App\subkategori;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\transaksi;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $dataongkir = $request->session()->all();
        if(!$request->session()->has('ongkir')){
            $dataongkir['ongkir'] = 0;
        }
      $produk = product::all();
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

    if(auth()->user() != null){
      if(auth()->user()->pembeli==null){
         $keranjang = keranjang::where('id_pembeli',0)->get();
      }
      else {
        $keranjang = keranjang::where('id_pembeli', auth()->user()->pembeli->id_pembeli)->get();
          foreach ($keranjang as $key => $value) {
            $id_subkategori[]=$value->ukuran->produk->jenis->kategori->subkategori->id_subkategori;
            $id_produk[]=$value->ukuran->produk->id_produk;

          }
        }
     
         if(count($keranjang)!=0){
         $product= product::join('jenis','jenis.id_jenis','=','produk.id_jenis')->join('kategori','kategori.id_kategori','=','jenis.id_kategori')->join('subkategori','subkategori.id_subkategori','=','kategori.id_subkategori')->join('ukuran', 'ukuran.id_produk', 'produk.id_produk')->where('ukuran.stok_ukuran', '>' , 0)->whereIn('subkategori.id_subkategori',$id_subkategori)->whereNotIn('produk.id_produk',$id_produk)->select('produk.*')->inRandomOrder()->limit(3)->distinct()->get();
       }
       else{
        $product= product::join('ukuran', 'ukuran.id_produk', 'produk.id_produk')->where('ukuran.stok_ukuran', '>' , 0)->select('produk.*')->inRandomOrder()->limit(3)->distinct()->get();
       }
        return view('layout-universal.cart')->with('kategori',$kategori)->with('produk',$produk)->with('jenis',$jenis)->with('brand',$brand)->with('subkategori',$subkategori)->with('keranjang',$keranjang)->with('product',$product)->with('dataongkir',$dataongkir)->with('belumbayar',$belumbayar);

    }else{
        return redirect('login');
    }
  }

  public function tambah(Request $request)
    {
        // dd($request->size);
      $pembeli='';
     
      // dd($pembeli);
      if($request->size==null){
        return redirect()->back();
      }

        foreach ($request -> size as $value) { 
           if(auth()->user()->pembeli==null){


         $pembeli=new pembeli;
         $pembeli->id_user=auth()->user()->id;
         $pembeli->save();
          $id_keranjang = keranjang::where ('id_pembeli',$pembeli->id_pembeli)->where('id_ukuran',$value)->first();

      }
      else {
            $id_keranjang = keranjang::where ('id_pembeli',auth()->user()->pembeli->id_pembeli)->where('id_ukuran',$value)->first(); }
            if($id_keranjang !=NULL) {
                $keranjang = keranjang::find($id_keranjang->id_keranjang);
                $ukuran = ukuran::where('id_ukuran',$keranjang->ukuran->id_ukuran)->first();
                $ukuran->stok_ukuran =  $ukuran->stok_ukuran - 1;
                if($ukuran->stok_ukuran>= 0){
                  $ukuran->save();
                  $keranjang->jumlah  = $keranjang->jumlah +1;

                  $keranjang->save();
                }else{
                  return redirect()->back();
                }
               
            }
        else {
           $keranjang = new keranjang; // new Model
           if(auth()->user()->pembeli==null){
            $keranjang->id_pembeli = $pembeli->id_pembeli;
          }
          else{
        $keranjang->id_pembeli = auth()->user()->pembeli->id_pembeli;}
        $keranjang->id_ukuran = $value;
        $keranjang->jumlah = 1;

        $keranjang->save();
         $ukuran = ukuran::where('id_ukuran',$keranjang->ukuran->id_ukuran)->first();
        $ukuran->stok_ukuran =  $ukuran->stok_ukuran - 1;
        $ukuran->save();
    }
        }
          return redirect('cart');

       //
    }
    public function showEdit($id)
    {
        // cari data yang akan diedit
       
       $produk = product::find($id);
        $jenis = jenis::where('id_kategori',$produk->jenis->id_kategori)->get();
        $kategori = kategori::all();
        // tampilkan view beserta data yang akan diedit
        return view('admin.produk.edit')->with('kategori',$kategori)->with('produk',$produk)->with('jenis',$jenis);
    }

    
        // proses update data
       public function postUpdate($id, $jumlah)
    {  
      $keranjang = keranjang::find($id);
      $hasil[]= $keranjang->ukuran->produk->harga*($jumlah-$keranjang->jumlah);
      $ukuran = ukuran::where('id_ukuran',$keranjang->ukuran->id_ukuran)->first();
      $ukuran->stok_ukuran =  $ukuran->stok_ukuran - ($jumlah-$keranjang->jumlah);
      // dd($ukuran->stok_ukuran);
      if($ukuran->stok_ukuran>= 0){
        $ukuran->save();
        $keranjang->jumlah = $jumlah;

        $keranjang->save();
        $hasil[]=$keranjang->jumlah;
        $hasil[]= $keranjang->ukuran->produk->harga;
        $sebelumsum =keranjang::where ('id_pembeli',auth()->user()->pembeli->id_pembeli)->get();

        $hasil[]= $sebelumsum->sum('jumlah');
        $hasil[]= $ukuran->stok_ukuran;
        $hasil[]= $keranjang->diskon($id);
        $hasil[]= $keranjang->total($keranjang->id_pembeli)-$keranjang->totalDiskon($keranjang->id_pembeli);

         
          // kembali ke halaman ukuran
          return $hasil;//route
      }else{
        return 'stok tidak cukup';
      }
       
    }
       // proses update data
       public function delete($id)
    { 
      $keranjang = keranjang::find($id);
      $hasil[] = $keranjang->ukuran->produk->harga*keranjang::find($id)->jumlah;

      $ukuran = ukuran::where('id_ukuran',$keranjang->ukuran->id_ukuran)->first();
      $ukuran->stok_ukuran =  $ukuran->stok_ukuran + $keranjang->jumlah;
      $ukuran->save();
      $keranjang = keranjang::find($id)->delete();
      $sebelumsum =keranjang::where ('id_pembeli',auth()->user()->pembeli->id_pembeli)->get();
      $cart=keranjang::where('id_pembeli',auth()->user()->pembeli->id_pembeli)->first();
      if(count($cart)!=0){
     $hasil[]= $cart->total($cart->id_pembeli)-$cart->totalDiskon($cart->id_pembeli);}
     else{$hasil[]=0;}
      $hasil[]= $sebelumsum->sum('jumlah');


        return $hasil;//route
    }

}
