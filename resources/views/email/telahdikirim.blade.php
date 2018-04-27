@component('mail::message')
{{-- # {{ $content['title'] }} --}}
#TUKUAE

{{-- {{ $content['body'] }} --}}
<h1>Hello {{$transaksi->pembeli->user->name}},</h1> 
Thank you for have transfers your payment
<br>
<br>
<p style="font-size:15px">YOUR CODE :  <span style="font-weight:bold; color:black; font-size:17px"> {{$transaksi->kode}}</span></p>
<p style="font-size:15px">YOUR PRODUCT :  <span style="font-weight:bold; color:black; font-size:17px">@if($transaksi->status=="proses kirim") delivery to destination

@else
done
@endif</span></p>
<p style="font-size:20px">YOUR RECEIPT NUMBER :  <span style="font-weight:bold; color:black; font-size:23px"> {{$transaksi->pengiriman->no_resi}}</span></p>


  <p style="font-size:15px">Total your payment : <span style="font-weight:bold; color:black font-size:17px"> RP {{number_format($transaksi->total_harga + $transaksi->pengiriman->ongkir, 0, ',', '.')}}</span></p>

<h2>Detail Order</h2>


@component('mail::table')
| Product Name       | Price         | Quantity  | Sub Total
| ------------- |:-------------:| --------:| --------:|
@foreach($transaksi->detail_transaksi as $item)
| {{$item->ukuran->produk->nama_produk}} {{$item->ukuran->nama_ukuran}}     | RP {{number_format($item->ukuran->produk->harga, 0,',','.')}}      | {{$item->jumlah}}      | RP {{number_format($item->total_harga,0,',','.')}}      |
@endforeach
|      |  | Sub Total      | RP {{number_format($transaksi->total_harga,0, ',', '.')}} |
|      |  |Shipping & handling      | RP {{number_format($transaksi->pengiriman->ongkir,0,',','.')}}  |
|       |  | Total      | RP {{number_format($transaksi->total_harga + $transaksi->pengiriman->ongkir,0,',','.')}} |
@endcomponent

<p style="font-size:15px">To see more detail your transaction</p>
<span>
@component('mail::button', ['url' => 'http://localhost:8080/laravel/public/history'])
Your Transaction
@endcomponent
</span>

Regards from us,
<br>
Tukuae
@endcomponent