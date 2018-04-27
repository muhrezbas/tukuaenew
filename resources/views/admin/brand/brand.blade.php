@extends('admin.admin_template')
@section('css')
  <link href="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="panel panel-card" >

  <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               Tambah dan edit brand 
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
         <form method="post" action="{{ url('brandadmin/simpan') }}" style="margin-left:10px">
    {{ csrf_field() }}
    <div class="col-lg-10 col-md-10 col-sm-10">
    <label> Nama brand</label>
    <input type="text" class="form-control" name="nama_brand" placeholder="Nama brand (maksimal 50 karakter)" maxlength=50 required>
    
<br/>
<label> Informasi Brand</label>
    <input type="text" class="form-control" name="informasi_brand" placeholder="Informasi brand" >
    


    
<br/>
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
          <th>Nama brand</th>
          <th>Informasi brand</th>
          <th>Rating</th>
          <th>Feedback</th>
          <th></th>
      
          

 
        </tr>
      </thead>
      <tbody>
       
       @foreach ($brand as $row)
        <tr>
          <td>{{ $row->id_brand }}</td>
          <td>{{ $row->nama_brand }}</td>
           <td>{{ $row->informasi_brand }}</td>
           <td>@foreach ($row->rating as $rows)
           {{$rows->rating}}
           <br/>
           @endforeach</td>
            <td>@foreach ($row->rating as $raw)
           {{$raw->feedback}}
           <br/>
           @endforeach</td>
      
      
    

          <td>
            <a class="btn btn-edit" href="{{ url('brandadmin/edit/'.$row->id_brand) }}"><i class="fa fa-edit"></i>Edit</a>
            
         </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    </div>

 <script type="text/javascript">
      var counter = 1;

function addInput(divName){
    

          var newdiv = document.createElement('div');
          newdiv.innerHTML = "Entry " + (counter + 1) + " <br><input type='text' class='form-control' name='rating[]'>" + "Entry " + (counter + 1) + " <br><input type='text' class='form-control' name='feedback[]'>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
}
    </script>
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


