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
use App\Http\Requests\validOngkir;

class OngkirController extends Controller
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
        return view('layout-universal.checkout-deliv')->with('kategori',$kategori)->with('produk',$produk)->with('jenis',$jenis)->with('brand',$brand)->with('subkategori',$subkategori)->with('pembeli',$pembeli)->with('data',$data)->with('belumbayar',$belumbayar);
        // ->with('tiki',$respontiki)->with('pos',$responpos);
   
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
  

    public function kurir() 
 {

    $pembeli=pembeli::where('id_user', auth()->user()->id)->first();
         $berat = 0;
         foreach ($pembeli->keranjang as $key => $value) {
             $berat=$berat+($value->jumlah*$value->ukuran->produk->berat);
         }
         $url = "http://api.rajaongkir.com/starter/cost";
        $jne = array( 
            'origin' => '153',
            'destination' => $pembeli->id_kota,
            'weight'    =>  $berat,
            'courier'   =>  "jne"
        );
        $responsejne = \Httpful\Request::post($url)
        ->sendsJson()
        ->addHeaders(array('key' => '8a139d4ada80a196c057bc885ba410c6',))
        ->body($jne)
        ->expectsJson()
        ->send();
        $responjne = $responsejne->body->rajaongkir->results;
         $tiki = array( 
            'origin' => '153',
            'destination' => $pembeli->id_kota,
            'weight'    =>  $berat,
            'courier'   =>  "tiki"
        );
         // dd($responjne);
        $responsetiki = \Httpful\Request::post($url)
        ->sendsJson()
        ->addHeaders(array('key' => '8a139d4ada80a196c057bc885ba410c6',))
        ->body($tiki)
        ->expectsJson()
        ->send();
        $respontiki = $responsetiki->body->rajaongkir->results;
         $pos = array( 
            'origin' => '153',
            'destination' => $pembeli->id_kota,
            'weight'    =>  $berat,
            'courier'   =>  "pos"
        );
        $responsepos = \Httpful\Request::post($url)
        ->sendsJson()
        ->addHeaders(array('key' => '8a139d4ada80a196c057bc885ba410c6',))
        ->body($pos)
        ->expectsJson()
        ->send();
        $responpos = $responsepos->body->rajaongkir->results;

        
        $hasil[]=\Response::json($responjne);
        $hasil[]=\Response::json($respontiki);
        $hasil[]=\Response::json($responpos);

        return \Response::json($responjne);
}
public function simpan(validOngkir $request)
    {   


 $request->session()->put('ongkir', $request->ongkir);
 return redirect('bayar');
}
}
