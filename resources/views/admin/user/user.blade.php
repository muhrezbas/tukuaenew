@extends('admin.admin_template')

@section('css')
  <link href="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               Daftar User
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
        

    </div>


<br/>
     <div class="box-body table-responsive margin">                   
    <table id="data" class="table table-bordered table-hover dataTable table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
           <th>Username</th>       
          <th>Email</th>
          <th>Level</th>
          <th></th>
          
        </tr>
      </thead>
      <tbody>
       
       @foreach ($user as $row)
        <tr>
          <td>{{ $row->id }}</td>
          <td>{{ $row->name }}</td>
          <td>{{ $row->username }}</td>
          <td>{{ $row->email }}</td>
          <td>{{ $row->level }}</td>
       
            
            
            

         <td>
            <a class="btn btn-edit" href="{{ url('customer/edit/'.$row->id) }}"> <i class="fa fa-edit"></i>Edit</a>
            
            
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