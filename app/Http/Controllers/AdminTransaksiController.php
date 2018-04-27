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
use Carbon\Carbon;
use App\Mail\telah_dikirim;
use App\Mail\telah_dikonfirmasi;
use App\Mail\telah_sampai;
use Mail;


class AdminTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($request->url)){
            if($request->url=='transaksi_baru'){
                $transaksi = transaksi::where("status","menunggu admin")->get();
            }
            else {
                abort(404);
            }
        }
        else {
       $transaksi = transaksi::all();
         }
        $data = $request->session()->all();
        $produk = product::all();
        $jenis = jenis::all();
        $kategori = kategori::all();
        $subkategori = subkategori::all();
        $brand = brand::all();
        $rekening = rekening::all();
       
         
    
        return view('admin.transaksi.pembayaran')->with('kategori',$kategori)->with('produk',$produk)->with('jenis',$jenis)->with('brand',$brand)->with('subkategori',$subkategori)->with('data',$data)->with('rekening',$rekening)->with('transaksi',$transaksi);
    
   
    }
    public function showEditTransaksi($id)
    {
        // cari data yang akan diedit
 
        $rekening = rekening::all();
        $transaksi = transaksi::find($id);
        // tampilkan view beserta data yang akan diedit
        return view('admin.transaksi.edit_transaksi')->with('rekening',$rekening)->with('transaksi',$transaksi);
    }
    public function updateTransaksi($id, Request $request)
    {  
      $transaksi = transaksi::find($id);
      $transaksi->kode= $request->kode;
    $transaksi->id_pembeli = $request->id_pembeli;
    $transaksi->tanggal =  $request->tanggal;
    $transaksi->rekening->nama_bank = $request->bank;
    $transaksi->total_harga = $request->total_harga;
    $transaksi->status = $request->status;
    $transaksi->save();
     
       
        // kembali ke halaman ukuran
        return redirect('pembayaranadmin');//route
    }

    public function detail(Request $request,$id)
    {
        $data = $request->session()->all();
        $produk = product::all();
        $jenis = jenis::all();
        $kategori = kategori::all();
        $subkategori = subkategori::all();
        $brand = brand::all();
        $rekening = rekening::all();
        $transaksi = transaksi::all();
        $detail_transaksi = detail_transaksi::where('id_transaksi',$id)->get();
         
        
        return view('admin.transaksi.detailpembayaran')->with('kategori',$kategori)->with('produk',$produk)->with('jenis',$jenis)->with('brand',$brand)->with('subkategori',$subkategori)->with('data',$data)->with('rekening',$rekening)->with('detail_transaksi',$detail_transaksi)->with('transaksi',$transaksi);
    
   
    }
     public function showEditDetail(Request $request,$id)
    {
        $data = $request->session()->all();
        $produk = product::all();
        $jenis = jenis::all();
        $kategori = kategori::all();
        $subkategori = subkategori::all();
        $brand = brand::all();
        $rekening = rekening::all();
        $transaksi = transaksi::all();
        $detail_transaksi = detail_transaksi::find($id);
         
        
        return view('admin.transaksi.editDetailTransaksi')->with('kategori',$kategori)->with('produk',$produk)->with('jenis',$jenis)->with('brand',$brand)->with('subkategori',$subkategori)->with('data',$data)->with('rekening',$rekening)->with('detail_transaksi',$detail_transaksi)->with('transaksi',$transaksi);
    
   
    }
     public function updateDetailTransaksi($id, Request $request)
    {  
      $detail_transaksi = detail_transaksi::find($id);
  
    $detail_transaksi->jumlah=$request->jumlah;
    $detail_transaksi->total_harga= $request->total_harga;
 
    $detail_transaksi->save();
     
       
        // kembali ke halaman utama
        return redirect('pembayaranadmin/');//route
    }

    
     public function pengiriman(Request $request)
    {
        if(isset($request->url)){
            if($request->url=='transaksi_belum_terkirim'){
                $pengiriman = pengiriman::where("status","menunggu konfirmasi")->get();
            }
            else {
                abort(404);
            }
        }
        else {
        $pengiriman = pengiriman::all();
         }
        $data = $request->session()->all();
        $produk = product::all();
        $jenis = jenis::all();
        $kategori = kategori::all();
        $subkategori = subkategori::all();
        $brand = brand::all();
        $rekening = rekening::all();
    
         
        
        return view('admin.pengiriman.pengiriman')->with('kategori',$kategori)->with('produk',$produk)->with('jenis',$jenis)->with('brand',$brand)->with('subkategori',$subkategori)->with('data',$data)->with('rekening',$rekening)->with('pengiriman',$pengiriman);
    
   
    }
        public function showEditPengiriman($id)
    {
        // cari data yang akan diedit
 
        $transaksi = transaksi::all();
        $pengiriman = pengiriman::find($id);
        // tampilkan view beserta data yang akan diedit
        return view('admin.pengiriman.edit')->with('pengiriman',$pengiriman)->with('transaksi',$transaksi);
    }
    public function updatePengiriman($id, Request $request)
    {  
      $pengiriman = pengiriman::find($id);
      $pengiriman->transaksi->id_transaksi= $request->id_transaksi;
      $pengiriman->alamat= $request->alamat;
      $pengiriman->ongkir= $request->ongkir;
      $pengiriman->kodepos= $request->kodepos;
      $pengiriman->berat= $request->berat;
      $pengiriman->tanggal= $request->tanggal;
      $pengiriman->no_resi= $request->no_resi;
      $pengiriman->status= $request->status;

      
   
    $pengiriman->save();
    if ($request->status != "menunggu konfirmasi")
{

       $transaksi = transaksi::find($pengiriman->id_transaksi);
    if ($request->status == "proses dikirim"){
        $transaksi->status = "proses kirim";
         $receiverAddress = $transaksi->pembeli->user->email;

    Mail::to($receiverAddress)->send(new telah_dikirim($transaksi));
    }
    elseif ($request->status == "telah sampai"){
        $transaksi->status = "telah sampai";
                $receiverAddress = $transaksi->pembeli->user->email;

    Mail::to($receiverAddress)->send(new telah_sampai($transaksi));
    }
    else {
        $transaksi->status = "gagal";
    }
    $transaksi->save();
}
       
        // kembali ke halaman ukuran
        return redirect('pengiriman');//route
    }

    public function konfirmasi_pembayaran(Request $request)
    {
         if(isset($request->url)){
            if($request->url=='konfirmasi_pembayaran'){
                $pembayaran = pembayaran::where("status","menunggu konfirmasi admin")->get();
            }
            else {
                abort(404);
            }
        }
        else {
        $pembayaran = pembayaran::all();
         }
        $data = $request->session()->all();
        $produk = product::all();
        $jenis = jenis::all();
        $kategori = kategori::all();
        $subkategori = subkategori::all();
        $brand = brand::all();
        $rekening = rekening::all();

         
        
        return view('admin.transaksi.konfirmasi_pembayaran')->with('kategori',$kategori)->with('produk',$produk)->with('jenis',$jenis)->with('brand',$brand)->with('subkategori',$subkategori)->with('data',$data)->with('rekening',$rekening)->with('pembayaran',$pembayaran);
    
   
    }
    public function showEditPembayaran($id)
    {
        // cari data yang akan diedit
 
        $transaksi = transaksi::all();
        $pembayaran = pembayaran::find($id);
        // tampilkan view beserta data yang akan diedit
        return view('admin.transaksi.edit_pembayaran')->with('pembayaran',$pembayaran)->with('transaksi',$transaksi);
    }
    public function updatePembayaran($id, Request $request)
    {  
   
      $pembayaran = pembayaran::find($id);
      $pembayaran->transaksi->kode= $request->kode;
    $pembayaran->tanggal =  $request->tanggal;
    $pembayaran->bank_pembeli = $request->bank_pembeli;
    $pembayaran->rekening_pembeli = $request->rekening_pembeli;
    $pembayaran->atas_nama_pembeli = $request->atas_nama_pembeli;
    $pembayaran->nominal = $request->nominal;
    $pembayaran->status = $request->status;
    $pembayaran->save();
 if ($request->status != "menunggu konfirmasi admin")
{

    $transaksi = transaksi::find($pembayaran->id_transaksi);
    if ($request->status == "telah dikonfirmasi"){
        $transaksi->status = "telah dibayar";
         $receiverAddress = $transaksi->pembeli->user->email;

    Mail::to($receiverAddress)->send(new telah_dikonfirmasi($transaksi));
    }
    else {
        $transaksi->status = "gagal";
          $receiverAddress = $transaksi->pembeli->user->email;
          Mail::to($receiverAddress)->send(new telah_dikonfirmasi($transaksi));
    
        foreach ($transaksi->detail_transaksi as $value) {
            $detail_transaksi=detail_transaksi::find($value->id_detail_transaksi);
            $ukuran=ukuran::find($detail_transaksi->id_ukuran);
            $ukuran->stok_ukuran=$ukuran->stok_ukuran+$detail_transaksi->jumlah;
            $ukuran->save();

        }
    }
    $transaksi->save();
}
       
        // kembali ke halaman ukuran
        return redirect('konfirmasipembayaranadmin');//route
    }
  

     
}
