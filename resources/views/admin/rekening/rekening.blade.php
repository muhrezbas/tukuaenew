@extends('admin.admin_template')

@section('css')
  <link href="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="panel panel-card" >

  <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               Tambah dan edit rekening 
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
         <form method="post" action="{{ url('rekeningadmin/simpan') }}" style="margin-left:10px">
    {{ csrf_field() }}
    <div class="col-lg-10 col-md-10 col-sm-10">
    <label> Nama Bank</label>
    <input type="text" class="form-control" name="nama_bank" placeholder="Nama Bank(maksimal 10 karakter)" maxlength=10 required>
  <br/>
    <label> Atas Nama</label>
    <input type="text" class="form-control" name="atasnama" placeholder="Atas Nama(maksimal 30 karakter)" maxlength=30 required>
  <br/>
    <label> Nomor Rekening</label>
    <input type="text" class="form-control" name="no_rek" placeholder="No Rekening(maksimal 30 karakter)" maxlength=30 required>
            @if ($errors->has('no_rek')) <p class="help-block">{{ $errors->first('no_rek') }}</p> @endif
    
<br/>
 

  </div>

  </div>

    <button type="submit"  class="btn btn-fw btn-info waves-effect waves-effect">Tambah</button>
    </form>

    </div>
    <br/>
     <div class="box-body table-responsive margin">                   
    <table id="data" class="table table-bordered table-hover dataTable table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama bank</th>
          <th>Atas nama</th>
          <th>Nomor Rekening</th>
          <th></th>
    

          

 
        </tr>
      </thead>
      <tbody>
       
       @foreach ($rekening as $row)
        <tr>
          <td>{{ $row->id_rekening }}</td>
          <td>{{ $row->nama_bank }}</td>
          <td>{{ $row->atasnama }}</td>
          <td>{{ $row->no_rek }}</td>
     
    

          <td>
            <a class="btn btn-edit" href="{{ url('rekeningadmin/edit/'.$row->id_rekening) }}"><i class="fa fa-edit"></i>Edit</a>
            
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


