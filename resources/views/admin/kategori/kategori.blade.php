@extends('admin.admin_template')

@section('css')
  <link href="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="panel panel-card" >

  <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               Tambah dan edit kategori 
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
         <form method="post" action="{{ url('kategoriadmin/simpan') }}" style="margin-left:10px">
    {{ csrf_field() }}
    <div class="col-lg-10 col-md-10 col-sm-10">
    <label> Nama kategori</label>
    <input type="text" class="form-control" name="nama_kategori" placeholder="Nama kategori (maksimal 50 karakter)" maxlength=50 required>
    
<br/>
  <label>Subkategori</label>
    <div class="form-group">
                 <select class="form-control" name="id_subkategori">
                  @foreach ($subkategori as $subkategori)
                    <option value="{{$subkategori->id_subkategori}}">{{$subkategori->nama_subkategori}}</option>
                  @endforeach
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
          <th>Nama kategori</th>
          <th>Subkategori</th>
          <th></th>

          

 
        </tr>
      </thead>
      <tbody>
       
       @foreach ($kategori as $row)
        <tr>
          <td>{{ $row->id_kategori }}</td>
          <td>{{ $row->nama_kategori }}</td>
          <td>{{ $row->subkategori->nama_subkategori }}</td>

    

          <td>
            <a class="btn btn-edit" href="{{ url('kategoriadmin/edit/'.$row->id_kategori) }}"><i class="fa fa-edit"></i>Edit</a>
            
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

