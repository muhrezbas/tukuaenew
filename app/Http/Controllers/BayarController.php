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
use App\subkategori;
use App\transaksi;
use App\pengiriman;
use App\detail_transaksi;
use App\pembeli;
use App\pembayaran;
use App\rekening;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\validRekening;

class BayarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->session()->all();
        $produk = product::all();
        $jenis = jenis::all();
        $kategori = kategori::all();
        $subkategori = subkategori::all();
        $brand = brand::all();
        $rekening = rekening::all();
         if(auth()->user()==null||auth()->user()->pembeli==null){
            $belumbayar=null;
        }

        else {
        $belumbayar = transaksi::where('id_pembeli', auth()->user()->pembeli->id_pembeli)->whereIn('status',['menunggu pembayaran','menunggu admin'])->first();
    }

        if(!$request->session()->has('ongkir')){
            $data['ongkir'] = 0;
        }
         

       $pembeli=pembeli::where('id_user', auth()->user()->id)->first();
        return view('layout-universal.checkout-payment')->with('kategori',$kategori)->with('produk',$produk)->with('jenis',$jenis)->with('brand',$brand)->with('subkategori',$subkategori)->with('pembeli',$pembeli)->with('data',$data)->with('rekening',$rekening)->with('belumbayar',$belumbayar);
        // ->with('tiki',$respontiki)->with('pos',$responpos);
   
    }
    public function simpan(validRekening $request)
    {   


 $request->session()->put('id_rekening', $request->id_rekening);
 return redirect('review');
}

     
}
