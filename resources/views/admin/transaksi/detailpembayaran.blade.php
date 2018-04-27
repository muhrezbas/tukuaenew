@extends('admin.admin_template')

@section('css')
  <link href="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
       <a class="btn btn-kembali" href="{{ url('pembayaranadmin/')}}">Kembali ke Transaksi</a>
     <div class="box-body table-responsive margin">                   
    <table id="data" class="table table-bordered table-hover dataTable table-striped">
      <thead>
        <tr>
         
          <th>Nama Produk</th>
          <th>Ukuran</th>
          <th>Brand</th>
          <th>Jumlah</th>
          <th>Total harga</th>
             <th></th>
    

          

 
        </tr>
      </thead>
      <tbody>
       
       @foreach ($detail_transaksi as $row)
        <tr>
         
          <td>{{ $row->ukuran->produk->nama_produk }}</td>
          <td>{{ $row->ukuran->nama_ukuran }}</td>
          <td>{{ $row->ukuran->produk->brand->nama_brand }}</td>
          <td>{{ $row->jumlah}}</td>
          <td>Rp {{ number_format($row->total_harga,0) }}</td>

         


       
    

          <td>
  
            <a class="btn btn-edit" href="{{ url('pembayaranadmin/detail/edit/'.$row->id_detail_transaksi) }}">
            <i class="fa fa-edit"></i> Edit</a>
            
         </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    </div>

    @endsection


        @section('js')
         <script src="{{ url('adminlte/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
  <script src="{{ url('adminlte/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
$(function () {
    $('#data').DataTable()
  
  })
</script>
  @endsection


