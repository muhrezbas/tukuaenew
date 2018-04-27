@extends('admin.admin_template')

@section('css')
  <link href="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="panel panel-card" >

  <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               Tambah dan edit produk 
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
         <form method="post" action="{{ url('ukuran/simpan') }}" style="margin-left:10px">
    {{ csrf_field() }}
    <div class="col-lg-10 col-md-10 col-sm-10">
  <!--   <label> Nama produk</label> -->
<label>produk</label>
    <div class="form-group">
                 <select class="form-control" name="id_produk">
                  @foreach ($produk as $produk)
                    <option value="{{$produk->id_produk}}">{{$produk->nama_produk}}</option>
                  @endforeach
                  </select>
                </div>
    
<br/>
    

   
<label> Nama Jenis Ukuran Produk</label>
    <input type="text" class="form-control" name="nama_ukuran" placeholder="Nama produk (maksimal 50 karakter)" maxlength=50 required>
    
<br/>
<label> Stok Produk</label>
    <input type="text" class="form-control" name="stok_ukuran" placeholder="Nama produk (maksimal 100 karakter)" required>
    @if ($errors->has('stok_ukuran')) <p class="help-block">{{ $errors->first('stok_ukuran') }}</p> @endif
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
          <th>ID Produk</th>
          <th>Nama Produk</th>
          <th>ID Ukuran</th>
          <th>Nama Jenis Ukuran Produk</th>
          <th>Stok Produk</th>
          <th></th>



          <!-- <th>Nama produk</th>
          <th>Kategori</th> -->
          

 
        </tr>
      </thead>
      <tbody>
       
       @foreach ($ukuran as $row)
        <tr>
         <td>{{ $row->produk->id_produk }}</td>
          <td>{{ $row->produk->nama_produk }}</td>
          <td>{{ $row->id_ukuran }}</td>
          <td>{{ $row->nama_ukuran }}</td>
          <td>{{ $row->stok_ukuran}}</td>


    

          <td>
            <a class="btn btn-edit" href="{{ url('ukuran/edit/'.$row->id_ukuran) }}"><i class="fa fa-edit"></i>Edit</a>
            
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

