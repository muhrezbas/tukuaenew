@extends('admin.admin_template')
@section('css')
  <link href="{{ url('/adminlte/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="panel panel-card" >

  <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               Tambah dan edit artikel Review
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
         <form method="post" action="{{ url('blogadmin/simpan') }}" style="margin-left:10px">
    {{ csrf_field() }}
    <div class="col-lg-10 col-md-10 col-sm-10">
<label> Judul Artikel</label>
    <input type="text" class="form-control" name="judul_blog" placeholder="Judul Artikel">
    
<br/>
 <label> Penulis</label>
    <input type="text" class="form-control" name="penulis" placeholder="Penulis (maksimal 50 karakter)" maxlength=50 required>
<br/>
<!-- <label> Kepada</label>
    <input type="text" class="form-control" name="buatsiapa" placeholder="Kepada (maksimal 30 karakter)" maxlength=30 required>
<br/> -->
<label>Brand</label>
    <div class="form-group">

                  <select class="form-control" name="id_brand" required>
                  @foreach ($brand as $brand)
                    <option value="{{$brand->id_brand}}">{{$brand->nama_brand}}</option>
                  @endforeach
                  </select>
                </div>
<label> Thumbnail Artikel</label>
    <input type="text" class="form-control" name="thumbnail" placeholder="Thumbnail">
<br/>
<label> Deskripsi</label>
<textarea class="form-control" id="summary-ckeditor2" type="input" name="deskripsi_artikel"></textarea>
<br/>
<label> Isi Artikel</label>
<textarea class="form-control" id="summary-ckeditor" name="artikel"></textarea>
<br/>
  </div>

  </div>

    <button type="submit"  class="btn btn-fw btn-info waves-effect waves-effect">Tambah</button>
    </form>

    </div>
    <br/>
     <div class="box-body table-responsive margin">     

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div style="width: 80%;" class="modal-dialog modal-sm-12">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">ISI ARTIKEL</h4>
                    </div>
                    <div class="modal-body">
                  
                    
                   
                    </div>
                </div>
            </div>
        </div>              
    <table id="data" class="table table-bordered table-hover dataTable table-striped">
       
      <thead>
        <tr>
          <th>ID</th>
          <th>Judul Artikel</th>
          <th>Penulis</th>
          <th>Brand</th>
          <th>Thumbnail</th>
          <th>Deskripsi</th>
          <th>Isi Artikel</th>
          <th>Dipost</th>
          <th></th>

 
        </tr>
      </thead>
      <tbody>
       
       @foreach ($blog as $index=>$row)
        <tr>
          <td>{{ $row->id_blog }}</td>
          <td>{{ $row->judul_blog }}</td>
         <td>{{ $row->penulis }}</td>
         <td>{{ $row->brand->nama_brand }}</td>
        <td><img src="https://drive.google.com/uc?export=view&id={{substr($row->thumbnail,33)}}" class="img-responsive" alt="Example blog post alt"></td>


         <td>{!! $row->deskripsi_artikel !!}</td>


         <td><a href="#" data-id="{{$index}}" data-toggle="modal" data-target="#login-modal"> <span class="hidden-xs text-uppercase">CLICK HERE</span></a></td>
         
         <div id="array{{$index}}" class="hidden"> {!! $blog[$index]->artikel !!}</div>


         <td>{{ $row->created_at }}</td>


          <td>
            <a class="btn btn-edit" href="{{ url('blogadmin/edit/'.$row->id_blog) }}"> <i class="fa fa-edit"></i>Edit</a>
            
            
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

    CKEDITOR.replace( 'summary-ckeditor' );
    CKEDITOR.replace( 'summary-ckeditor2' );
$(function () {
    $('#data').DataTable()
  
  })
</script>
 <script type="text/javascript">
  $('#login-modal').on('shown.bs.modal', function (e) {
  var button = $(e.relatedTarget) // Button that triggered the modal
  var recipient = button.data('id')
  $('.modal-body').html($('#array'+recipient).html())
  console.log($('#array'+recipient).html());
})
    </script>
            @endsection
