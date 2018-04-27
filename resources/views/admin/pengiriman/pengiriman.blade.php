@extends('admin.admin_template')
@section('css')
  <link href="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

     <div class="box-body table-responsive margin">                   
    <table id="data" class="table table-bordered table-hover dataTable table-striped">
      <thead>
        <tr>
          <th>ID Transaksi</th>
          <th>Nama Pembeli</th>
          <th>Alamat</th>
          <th>Kota</th>
          <th>Provinsi</th>
          <th>Kodepos</th>
          <th>Harga Ongkir</th>
          <th>Total Berat</th>
          <th>Tanggal Kirim</th>
          <th>No resi</th>
          <th>Status</th>
          <th></th>
          <th></th>

          

 
        </tr>
      </thead>
      <tbody>
       
       @foreach ($pengiriman as $row)
        <tr>
          <td>{{ $row->transaksi->id_transaksi }}</td>
          <td>{{ $row->transaksi->pembeli->user->name }}</td>
          <td>{{ $row->alamat }}</td>
          <td>{{ $row->kota }}</td>
          <td>{{ $row->provinsi}}</td>
          <td>{{ $row->kodepos}}</td>
          <td>Rp {{ number_format($row->ongkir,0) }}</td>
          <td>{{ $row->berat}} Gram</td>
          <td>{{ $row->tanggal}}</td>
          <td>{{ $row->no_resi}}</td>
          <td>{{ $row->status}}</td>
          <td>{{ $row->updated_at}}</td>



       
    

          <td>
            <a class="btn btn-edit" href="{{ url('pengiriman/edit/'.$row->id_pengiriman) }}"><i class="fa fa-edit"></i>Edit</a>
            
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
    $('#data').DataTable({
      "order":[[11,"desc"]],
      "columnDefs": [
      {
        "targets" : [11],
        "visible" : false,
        "searchable" :false
      }]
    });

  
  })
</script>
  @endsection


