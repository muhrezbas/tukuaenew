@extends('admin.admin_template')
@section('css')

@endsection

@section('content')
<h2>BERANDA</h2>
<div class="row">
<div class="col-lg-3 col-xs-6">

          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{\App\transaksi::where("status","menunggu admin")->count()}}</h3>

              <p>Transaksi baru</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{url('pembayaranadmin/transaksi_baru')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{\App\pembayaran::where("status","menunggu konfirmasi admin")->count()}}</h3>

              <p>Konfirmasi pembayaran</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="{{url('konfirmasipembayaranadmin/konfirmasi_pembayaran')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>{{\App\pengiriman::where("status","menunggu konfirmasi")->count()}}</h3>

              <p>Transaksi belum terkirim</p>
            </div>
            <div class="icon">
              <i class="ion ion-plane"></i>
            </div>
            <a href="{{url('pengiriman/transaksi_belum_terkirim')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
</div>
  <form method="post" action="{{ url('admin') }}" style="margin-left:10px">
    {{ csrf_field() }}
<div class="col-md-3">
                  <select class="form-control select2" style="width: 100%;" name="bulan" id="pilihBulan">
                    <option disabled="disabled" selected="selected" value="0">Pilih Bulan</option>
                      <option @if($bulan == 1) {{'selected'}} @endif value="1" url="/tahun={{$tahun}}">Januari</option>
                              <option @if($bulan == 2) {{'selected'}} @endif value="2" url="/tahun={{$tahun}}">Februari</option>
                              <option @if($bulan == 3) {{'selected'}} @endif value="3" url="/tahun={{$tahun}}">Maret</option>
                              <option @if($bulan == 4) {{'selected'}} @endif value="4" url="/tahun={{$tahun}}">April</option>
                              <option @if($bulan == 5) {{'selected'}} @endif value="5" url="/tahun={{$tahun}}">Mei</option>
                              <option @if($bulan == 6) {{'selected'}} @endif value="6" url="/tahun={{$tahun}}">Juni</option>
                              <option @if($bulan == 7) {{'selected'}} @endif value="7" url="/tahun={{$tahun}}">Juli</option>
                              <option @if($bulan == 8) {{'selected'}} @endif value="8" url="/tahun={{$tahun}}">Agustus</option>
                              <option @if($bulan == 9) {{'selected'}} @endif value="9" url="/tahun={{$tahun}}">September</option>
                              <option @if($bulan == 10) {{'selected'}} @endif value="10" url="/tahun={{$tahun}}">Oktober</option>
                              <option @if($bulan == 11) {{'selected'}} @endif value="11" url="/tahun={{$tahun}}">November</option>
                              <option @if($bulan == 12) {{'selected'}} @endif value="12" url="/tahun={{$tahun}}">Desember</option>
                  </select>
                <br>
                </div>
               <div class="col-md-3">
                  <select class="form-control select2" style="width: 100%;" name="tahun" id="pilihTahun3">
                    <option disabled="disabled" selected="selected" value="0">Pilih Tahun</option>
                    @for($i=$tahunawal; $i<=\Carbon\Carbon::now()->year; $i++)
                      <option @if($tahun == $i) {{'selected'}} @endif value="{{ $i }}">{{ $i }}</option>
                    @endfor
                  </select>
                <br>
                </div>
                <button class="btn btn-primary" id="btnCari">Cari</button>
                </form>

               
<div id="container" style=" min-width: 310px; height: 400px; max-width: 600px; margin: 30px auto"></div>

<br>
<br>
<div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
 

  
    @endsection
    



        @section('js')

  <script src="{{ url('/Highcharts/code/highcharts.js') }}"></script>
    <script src="{{ url('/Highcharts/code/modules/exporting.js') }}"></script>
    <script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Jumlah Penjualan'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} % ,<br> Jumlah : {point.y}',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [

    {
        name: 'Brands',
        colorByPoint: true,
        data: [
            @foreach($laporan as $row)
        {
            name: '{{$row->nama_brand}}',
            y: {{$row->total_penjualan}}
        },
@endforeach
        ]
    }]
});
    </script>
     <script type="text/javascript">

Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Penghasilan brand perbulan'
    },
   
    xAxis: {
        categories: [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah penghasilan(Rp)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>Rp {point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [
 @foreach($grafikJual as $data)
    {
      name: "{{$data[1]['nama']}}",
      
        
        data: [
         @foreach($data as $datas)
         {{$datas['total_penjualan']}},
@endforeach
        ]

    },
@endforeach

    ]
});


   
    </script>


            @endsection
