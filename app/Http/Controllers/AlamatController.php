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
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\validAlamat;
class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->session()->all();
        if(!$request->session()->has('ongkir')){
            $data['ongkir'] = 0;
        }
        $produk = product::all();
        $jenis = jenis::all();
        $kategori = kategori::all();
        $subkategori = subkategori::all();
        $brand = brand::all();
        $pembeli=pembeli::where('id_user', auth()->user()->id)->first();
       if(auth()->user()==null||auth()->user()->pembeli==null){
            $belumbayar=null;
        }

        else {
        $belumbayar = transaksi::where('id_pembeli', auth()->user()->pembeli->id_pembeli)->whereIn('status',['menunggu pembayaran','menunggu admin'])->first();
    }
        return view('layout-universal.checkout-address')->with('kategori',$kategori)->with('produk',$produk)->with('jenis',$jenis)->with('brand',$brand)->with('subkategori',$subkategori)->with('pembeli',$pembeli)->with('data',$data)->with('belumbayar',$belumbayar);
   
    }
     public function kota($id) {
        $url = "http://api.rajaongkir.com/starter/city?province=".$id;
        $response = \Httpful\Request::get($url)
         ->addHeaders(array('key' => '8a139d4ada80a196c057bc885ba410c6',))
        ->expectsJson()
        ->send();
        $data = $response->body->rajaongkir->results;

        return \Response::json($data); 
    }
    public function simpan(validAlamat $request)
    {   
        $pembeli=pembeli::where('id_user', auth()->user()->id)->first();
        if ($pembeli==NULL){
            $pembeli = new pembeli; // new Model
        

        
        }
        $pembeli->alamat = $request->alamat;
        if($request->kota!=null){
            $pembeli->kota = $request->kota;
        }
        if($request->provinsi!=null){
            $pembeli->provinsi = $request->provinsi;
        }
        
        $pembeli->telp = $request->telp;
        $pembeli->kodepos = $request->kodepos;
        if($request->id_kota!=null){
            $pembeli->id_kota = $request->id_kota;
        }

        $pembeli->save();
        return redirect('ongkir');

       //
    }

}
