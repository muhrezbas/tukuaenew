@extends('admin.admin_template')

@section('css')
  <link href="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

     <div class="box-body table-responsive margin">                   
    <table id="data" class="table table-bordered table-hover dataTable table-striped">
      <thead>
        <tr>
          <th>Kode Transaksi</th>
          <th>ID transaksi</th>
          <th>ID pembeli</th>
          <th>Nama pembeli</th>
          <th>Tanggal dipesan</th>
          <th>Bank ditransfer</th>
          <th>Uang masuk</th>
          <th>Status</th>
          <th></th>
          <th></th>

          

 
        </tr>
      </thead>
      <tbody>
       
       @foreach ($transaksi as $row)
        <tr>
          <td>{{ $row->kode }}</td>
          <td>{{ $row->id_transaksi}}</td>
          <td>{{ $row->id_pembeli }}</td>
          <td>{{ $row->pembeli->user->name }}</td>
          <td>{{ $row->tanggal }}</td>
          <td>{{ $row->rekening->nama_bank}}</td>
          <td>Rp {{ number_format($row->total_harga,0) }}</td>
          <td>{{ $row->status}}</td>
          <td>{{$row->updated_at}}</td>



       
    

          <td>
          <a class="btn btn-detail" href="{{ url('pembayaranadmin/detail/'.$row->id_transaksi) }}"><i class="fa fa-eye"></i>Detail</a>
            <a class="btn btn-edit" href="{{ url('pembayaranadmin/edit/'.$row->id_transaksi) }}"><i class="fa fa-edit"></i>Edit</a>
            
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
      "order":[[8,"desc"]],
      "columnDefs": [
      {
        "targets" : [8],
        "visible" : false,
        "searchable" :false
      }]
    });

  
  })
</script>
  @endsection


