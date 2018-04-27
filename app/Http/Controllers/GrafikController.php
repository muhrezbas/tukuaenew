<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\brand;
use App\transaksi;

class GrafikController extends Controller
{
    public function index(Request $request){
        if($request->bulan == null){
            $request->bulan = Carbon::now()->month;
        }
        if($request->tahun == null){
            $request->tahun = Carbon::now()->year;
        }

       $laporan = DB::select('SELECT brand.nama_brand as nama_brand, sum(detail_transaksi.jumlah) as total_penjualan FROM transaksi JOIN detail_transaksi on transaksi.id_transaksi=detail_transaksi.id_transaksi JOIN ukuran on detail_transaksi.id_ukuran=ukuran.id_ukuran join produk on produk.id_produk=ukuran.id_produk join brand on produk.id_brand=brand.id_brand WHERE month(transaksi.tanggal)="'.$request->bulan.'" AND year(transaksi.tanggal)="'.$request->tahun.'" GROUP BY brand.nama_brand');



$brand = brand::all();
foreach ($brand as $key => $value) {
    $totalBrand = DB::select('SELECT brand.nama_brand as nama, sum(detail_transaksi.total_harga) as total_penjualan, month(transaksi.tanggal) as bulan FROM transaksi JOIN detail_transaksi on transaksi.id_transaksi=detail_transaksi.id_transaksi JOIN ukuran on detail_transaksi.id_ukuran=ukuran.id_ukuran join produk on produk.id_produk=ukuran.id_produk join brand on produk.id_brand=brand.id_brand where brand.id_brand='.$value->id_brand.' AND year(transaksi.tanggal)='.$request->tahun.' GROUP BY brand.nama_brand, month(transaksi.tanggal), year(transaksi.tanggal)');

     $index = 0;
            $laporan2 = array();
            for($i = 1; $i <= 12; $i++){
                if($index < count($totalBrand)){
                    if($i == $totalBrand[$index]->bulan){
                        $laporan2[$i]['nama']=$totalBrand[$index]->nama;
                        $laporan2[$i]['total_penjualan']=$totalBrand[$index]->total_penjualan;
                        $index++;
                    }else{
                        $laporan2[$i]['nama']=$totalBrand[$index]->nama;
                        $laporan2[$i]['total_penjualan']=0;
                    }
                }else{
                    $laporan2[$i]['nama']=$value->nama_brand;
                    $laporan2[$i]['total_penjualan']=0;
                }

                $laporan2[$i]['bulan'] = $i;
            }
            // dd($laporan2);

            $grafikJual[]=$laporan2;

}
      $tahunawal = Carbon::parse(transaksi::first()->created_at)->year;

       

       // dd($grafikJual);
       return view('admin.grafik')->with('laporan', $laporan)->with('grafikJual', $grafikJual)->with('tahunawal',$tahunawal)->with('tahun',$request->tahun)->with('bulan',$request->bulan);
    }
    public function login(){


     return view('admin.login');

 }
 
   
}
