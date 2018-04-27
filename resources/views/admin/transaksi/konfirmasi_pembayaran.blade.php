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
          <th>Nama pembeli</th>
          <th>Tanggal Transfer</th>
          <th>Bank Pembeli</th>
          <th>No rekening</th>
          <th>Atas Nama</th>
          <th>Nominal Transfer</th>
          <th>Bukti Transfer</th>
          <th>Status</th>
          <th></th>
          <th></th>

          

 
        </tr>
      </thead>
      <tbody>
       
       @foreach ($pembayaran as $row)
        <tr>
          <td>{{ $row->transaksi->kode }}</td>
          <td>{{ $row->transaksi->pembeli->user->name }}</td>
          <td>{{ $row->tanggal }}</td>
          <td>{{ $row->bank_pembeli}}</td>
          <td>{{ $row->rekening_pembeli}}</td>
          <td>{{ $row->atas_nama_pembeli}}</td>
          <td>Rp {{ number_format($row->nominal,0) }}</td> 
          <td><img src="{{asset('storage/'.$row->bukti)}}" /></td>
          <td>{{ $row->status}}</td>
          <td>{{$row->updated_at}}</td>



       
    

          <td>
            <a class="btn btn-edit" href="{{ url('konfirmasipembayaranadmin/edit/'.$row->id_pembayaran) }}"><i class="fa fa-edit"></i>Edit</a>
            
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

<script>


$(function () {
    $('#data').DataTable({
      "order":[[9,"desc"]],
      "columnDefs": [
      {
        "targets" : [9],
        "visible" : false,
        "searchable" :false
      }]
    });

  
  })
</script>
 @endsection
