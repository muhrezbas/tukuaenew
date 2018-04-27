@extends('admin.admin_template')

@section('css')
  <link href="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="panel panel-card" >

  <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               Tambah dan edit jenis 
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
         <form method="post" action="{{ url('jenisadmin/simpan') }}" style="margin-left:10px">
    {{ csrf_field() }}
    <div class="col-lg-10 col-md-10 col-sm-10">
    <label> Nama jenis</label>
    <input type="text" class="form-control" name="nama_jenis" placeholder="Nama jenis (maksimal 50 karakter)" maxlength=50 required>
    
<br/>
  <label>Subkategori</label>
    <div class="form-group">

                  <select id="subkategori" class="form-control" name="id_subkategori">
                   <option></option>
                  @foreach ($subkategori as $no=>$subkategori)
                    <option value="{{$subkategori->id_subkategori}}">{{$subkategori->nama_subkategori}}</option>
                  @endforeach
                  </select>
                </div>
<br/>
  <label>Kategori</label>
    <div class="form-group">

                  <select id="kategori" class="form-control" name="id_kategori">
                  
                  </select>
                </div>
    
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
          <th>Nama Jenis</th>
          <th>Kategori</th>
          <th>Subkategori</th>
          <th></th>
          

 
        </tr>
      </thead>
      <tbody>
       
       @foreach ($jenis as $row)
        <tr>
          <td>{{ $row->id_jenis }}</td>
          <td>{{ $row->nama_jenis }}</td>
          <td>{{ $row->kategori->nama_kategori}}</td>
          <td>{{ $row->kategori->subkategori->nama_subkategori}}</td>
    

          <td>
            <a class="btn btn-edit" href="{{ url('jenisadmin/edit/'.$row->id_jenis) }}"><i class="fa fa-edit"></i>Edit</a>
            
         </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    </div>

    @endsection


        @section('js')

<script type="text/javascript">
  $('#subkategori').change(function(){
 $.get('kategoriadmin/kategori/' + $(this).val(), function(data){  
         $('#kategori').empty();
        $.each(data, function(index, data){
          $('#kategori').append('<option value="'+data.id_kategori+'" >'+data.nama_kategori+'</option>');
        });
      });
  })
</script>
 <script src="{{ url('adminlte/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
  <script src="{{ url('adminlte/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
$(function () {
    $('#data').DataTable()
  
  })
</script>

    @endsection
