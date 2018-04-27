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
use App\rating;
use Mail;
use App\Mail\konfirmasi_pembayaran;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\validKonfirmasi;
use Carbon\Carbon;

class ReviewController extends Controller
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
        return view('layout-universal.checkout-order-review')->with('kategori',$kategori)->with('produk',$produk)->with('jenis',$jenis)->with('brand',$brand)->with('subkategori',$subkategori)->with('pembeli',$pembeli)->with('data',$data)->with('rekening',$rekening)->with('belumbayar',$belumbayar);

   
    }
     
    public function konfirmasi(Request $request)
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
        
       $pembeli=pembeli::where('id_user', auth()->user()->id)->first();
        return view('layout-universal.checkout-final')->with('kategori',$kategori)->with('produk',$produk)->with('jenis',$jenis)->with('brand',$brand)->with('subkategori',$subkategori)->with('pembeli',$pembeli)->with('data',$data)->with('rekening',$rekening)->with('belumbayar',$belumbayar);
 
   
    }
    public function detail(Request $request)
    {
        if(auth()->user()->pembeli==null){
        $detail_transaksi =null;
    }
    else {
        $detail_transaksi = transaksi::where('id_pembeli', auth()->user()->pembeli->id_pembeli)->whereIn('status',['menunggu pembayaran','menunggu admin'])->first();
        if($detail_transaksi!=null){
          $detail_transaksi =  $detail_transaksi->detail_transaksi;
        }
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
        
         
        // dd($detail_transaksi);
       $pembeli=pembeli::where('id_user', auth()->user()->id)->first();
        return view('layout-universal.checkout-detail')->with('kategori',$kategori)->with('produk',$produk)->with('jenis',$jenis)->with('brand',$brand)->with('subkategori',$subkategori)->with('pembeli',$pembeli)->with('detail_transaksi',$detail_transaksi)->with('belumbayar',$belumbayar);
 
   
    }
    public function history(Request $request)
    {
        if(auth()->user()->pembeli==null){
        $transaksi =null;
    }
    else {
        $transaksi = transaksi::where('id_pembeli', auth()->user()->pembeli->id_pembeli)->whereNotIn('status',['menunggu pembayaran','menunggu admin'])->orderBy('updated_at','desc')->get();}
        

        
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
        
         
        // dd($detail_transaksi);
       $pembeli=pembeli::where('id_user', auth()->user()->id)->first();
        return view('layout-universal.history')->with('kategori',$kategori)->with('produk',$produk)->with('jenis',$jenis)->with('brand',$brand)->with('subkategori',$subkategori)->with('pembeli',$pembeli)->with('transaksi',$transaksi)->with('belumbayar',$belumbayar);
 
   
    }


    public function simpanKonfirmasi(validKonfirmasi $request){
        $pembayaran = new pembayaran;
        $pembayaran->id_transaksi = transaksi::where('kode', $request->kode)->first()->id_transaksi;
        $pembayaran->tanggal = Carbon::parse($request->tanggal)->format('Y-m-d');
        $pembayaran->nominal = $request->nominal;
        $pembayaran->bukti = $request->bukti;
        $pembayaran->rekening_pembeli = $request->no_rek;
        $pembayaran->atas_nama_pembeli = $request->atas_nama;
        $pembayaran->bank_pembeli = $request->bank;
        $pembayaran->status = "menunggu konfirmasi admin";


        $pembayaran->save();
        $transaksi= transaksi::find($pembayaran->id_transaksi);
        $transaksi->status="menunggu admin";
        $transaksi->save();
        return redirect('/');
    }
    public function destroy($id_transaksi)
    {
        $transaksi=transaksi::find($id_transaksi);
        foreach ($transaksi->detail_transaksi as $value) {
            $detail_transaksi=detail_transaksi::find($value->id_detail_transaksi);
            $ukuran=ukuran::find($detail_transaksi->id_ukuran);
            $ukuran->stok_ukuran=$ukuran->stok_ukuran+$detail_transaksi->jumlah;
            $ukuran->save();
        }
        detail_transaksi::where('id_transaksi', $id_transaksi)->delete();
        pengiriman::where('id_transaksi', $id_transaksi)->delete();
        transaksi::where('id_transaksi', $id_transaksi)->delete();
         return redirect('/');

    }
    public function rating($id_transaksi, Request $request)
    {
       
        foreach ($request->id_brand as $key=>$value) {
            $rating = new rating;
            $rating->id_transaksi=$id_transaksi;
            $rating->id_brand=$value;
            $rating->feedback=$request->feedback[$key];
            $rating->rating=$request->rating[$key];
            $rating->save();
        }
       
         return redirect()->back();

    }
    public function simpan(Request $request)
    {   

        $latestPembelian = transaksi::orderBy('id_transaksi', 'desc')->first();
         if(empty($latestPembelian)){
             $lastId = 1;
         }else{
             $lastId = $latestPembelian->id_transaksi + 1;
         }
 $data = $request->session()->all();
$transaksi= new transaksi;
$transaksi->kode='tukuae'.Carbon::now()->format('dmY').auth()->user()->pembeli->id_pembeli.$lastId;
$transaksi->id_pembeli = auth()->user()->pembeli->id_pembeli;
$transaksi->tanggal =  Carbon::now()->format('Y-m-d H:i:s');
$transaksi->id_rekening = $data['id_rekening'];
$pembeli=pembeli::where('id_user', auth()->user()->id)->first();
$transaksi->total_harga = $pembeli->keranjang[0]->total($pembeli->id_pembeli)-$pembeli->keranjang[0]->totalDiskon($pembeli->id_pembeli);
$transaksi->status = 'menunggu pembayaran';
$transaksi->save();
foreach ($pembeli->keranjang as $key => $value) {
    $detail_transaksi=new detail_transaksi;
    $detail_transaksi->id_ukuran=$value->id_ukuran;
    $detail_transaksi->jumlah=$value->jumlah;
    $detail_transaksi->diskon=$value->diskon($value->id_keranjang);
    $detail_transaksi->id_transaksi= $transaksi->id_transaksi;
    $detail_transaksi->total_harga= ($value->jumlah*$value->ukuran->produk->harga)-$value->diskon($value->id_keranjang);
    $detail_transaksi->save();
}
$pengiriman = new pengiriman;
$pengiriman->id_transaksi=$transaksi->id_transaksi;
$pengiriman->ongkir= $data['ongkir'];
$pengiriman->alamat=$pembeli->alamat;
$pengiriman->kota=$pembeli->kota;
$pengiriman->provinsi=$pembeli->provinsi;
$pengiriman->kodepos=$pembeli->kodepos;
 $berat = 0;
         foreach ($pembeli->keranjang as $key => $value) {
             $berat=$berat+($value->jumlah*$value->ukuran->produk->berat);
         }
$pengiriman->berat=$berat;
$pengiriman->status = 'menunggu konfirmasi';

$pengiriman->save();

keranjang::where('id_pembeli',auth()->user()->pembeli->id_pembeli)->delete();
 $receiverAddress = auth()->user()->email;
$waktu = Carbon::now();
        $waktu->addHours(2); 
Mail::to($receiverAddress)->send(new Konfirmasi_pembayaran($transaksi,$waktu));

 return redirect('detail');
}

     
}
