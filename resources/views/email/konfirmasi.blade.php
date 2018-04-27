@component('mail::message')
{{-- # {{ $content['title'] }} --}}
#TUKUAE

{{-- {{ $content['body'] }} --}}
<h1>Hello {{$transaksi->pembeli->user->name}},</h1> 
Thank you for have already made transaction in TUKUAE
<br>
<br>
<p style="font-size:15px">YOUR CODE :  <span style="font-weight:bold; color:black; font-size:17px"> {{$transaksi->kode}}</span></p>
<p style="font-size:15px">Please transfer before <span style="font-weight:bold; color:black; font-size:17px">  {{$tanggal}}</span></p>
<p style="font-size:13px">Detail payment transfer with information below :</p>
<p style="font-size:13px">Bank Destination : {{$transaksi->rekening->nama_bank}} </p>
<p style="font-size:13px">Account Number : {{$transaksi->rekening->no_rek}} </p>
<p style="font-size:13px">Account Name : {{$transaksi->rekening->atasnama}} </p>

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

<p style="font-size:15px">Confirmation payment with click button below</p>
<span>
@component('mail::button', ['url' => 'http://localhost/laravel/public/konfirmasi'])
Confirmation Payment
@endcomponent
</span>

Regards from us,
<br>
Tukuae
@endcomponent