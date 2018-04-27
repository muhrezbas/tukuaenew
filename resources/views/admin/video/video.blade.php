@extends('admin.admin_template')
@section('css')
  <link href="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="panel panel-card" >

  <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               Tambah dan edit Video Review
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
         <form method="post" action="{{ url('videoadmin/simpan') }}" style="margin-left:10px">
    {{ csrf_field() }}
    <div class="col-lg-10 col-md-10 col-sm-10">
    <label> Judul Video</label>
    <input type="text" class="form-control" name="judul_video" placeholder="Judul Video (maksimal 50 karakter)" maxlength=50 required>
    
<br/>
 <label> Link Video</label>
    <input type="text" class="form-control" name="link_video" placeholder="Link Video (maksimal 200 karakter)" maxlength=200 required>
<br/>
<!--  <label> Pembuat</label>
    <input type="text" class="form-control" name="pembuat" placeholder="Pembuat (maksimal 50 karakter)" maxlength=50 required>
<br/> -->
<label>Brand</label>
    <div class="form-group">

                  <select class="form-control" name="id_brand" required>
                  @foreach ($brand as $brand)
                    <option value="{{$brand->id_brand}}">{{$brand->nama_brand}}</option>
                  @endforeach
                  </select>
                </div>
<label> Source Video</label>
    <input type="text" class="form-control" name="sourcevideo" placeholder="Pembuat (maksimal 20 karakter)" maxlength=20 required>
<br/>
<label> Deskripsi</label>
<textarea class="form-control" id="summary-ckeditor" name="deskripsi"></textarea>
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
          <th>Judul Video</th>
          <th>Link Video</th>
          <th>Pembuat</th>
          <th>Source Video</th>
          <th>Deskripsi</th>
          <th>Dipost</th>
          <th></th>

 
        </tr>
      </thead>
      <tbody>
       
       @foreach ($video as $row)
        <tr>
          <td>{{ $row->id_video }}</td>
          <td>{{ $row->judul_video }}</td>
          <td>
          <div style="width: 170px;" class="embed-responsive embed-responsive-4by3">
                <iframe class="embed-responsive-item" src=" {{ $row->link_video }}"></iframe>
          </div>
          </td>
         <td>{{ $row->pembuat }}</td>
         <td>{{ $row->sourcevideo }}</td>
         <td>{!! $row->deskripsi !!}
         <td>{{ $row->created_at }}</td>


          <td>
            <a class="btn btn-edit" href="{{ url('videoadmin/edit/'.$row->id_video) }}"><i class="fa fa-edit"></i>Edit</a>
            
         </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    </div>

    @endsection


        @section('js')
        <script>
    CKEDITOR.replace( 'summary-ckeditor' );


</script>
 <script src="{{ url('adminlte/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
  <script src="{{ url('adminlte/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
$(function () {
    $('#data').DataTable()
  
  })
</script>

@endsection


