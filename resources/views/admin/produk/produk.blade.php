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
         <form method="post" action="{{ url('produkadmin/simpan') }}" style="margin-left:10px">
    {{ csrf_field() }}
    <div class="col-lg-10 col-md-10 col-sm-10">
    <label> Nama produk</label>
    <input type="text" class="form-control" name="nama_produk" placeholder="Nama produk (maksimal 50 karakter)" maxlength=50 required>
    
<br/>
<label>Brand</label>
    <div class="form-group">

                  <select class="form-control" name="id_brand" required>
                  @foreach ($brand as $brand)
                    <option value="{{$brand->id_brand}}">{{$brand->nama_brand}}</option>
                  @endforeach
                  </select>
                </div>
    


<label> Warna</label>
    <input type="text" class="form-control" name="warna" placeholder="Nama produk (maksimal 50 karakter)" maxlength=50 required>
    
<br/>
<label> Detail Produk</label>
    <input type="text" class="form-control" name="detail_produk" placeholder="Nama produk (maksimal 400 karakter)" maxlength=400 required>
    
<br/>
<label> Berat</label>
    <input type="text" class="form-control" name="berat" placeholder="Dalam gram" maxlength=50 required>
      @if ($errors->has('berat')) <p class="help-block">{{ $errors->first('berat') }}</p> @endif
    
<br/>
<label> Harga</label>
    <input type="text" class="form-control" name="harga" placeholder="Nama produk (maksimal 50 karakter)" maxlength=50 required>
      @if ($errors->has('harga')) <p class="help-block">{{ $errors->first('harga') }}</p> @endif
    
<br/>
<label> Jumlah potongan awal barang </label>
    <input type="text" class="form-control" name="startpotongan" placeholder="Angka (minimal 0)" required>
      @if ($errors->has('startpotongan')) <p class="help-block">{{ $errors->first('startpotongan') }}</p> @endif
    
<br/>
<label> Jumlah kelipatan barang</label>
    <input type="text" class="form-control" name="kelipatanpotongan" placeholder="Angka (minimal 0)" required>
      @if ($errors->has('kelipatanpotongan')) <p class="help-block">{{ $errors->first('kelipatanpotongan') }}</p> @endif
    
<br/>
<label> Diskon</label>
    <input type="text" class="form-control" name="potonganharga" placeholder="Percent (maksimal 3 karakter, minimal 0)" required>
      @if ($errors->has('potonganharga')) <p class="help-block">{{ $errors->first('potonganharga') }}</p> @endif
    
<br/>

<label> Foto Produk</label>
   <div id="dynamicInput">
          Entry<br><input type="text"  class="form-control" name="link_fotoproduk[]" required>
     </div>
<br/>
     <input type="button"  value="Masukan input" onClick="addInput('dynamicInput');">
    
<br/>
<br/>
<label>Subkategori</label>
    <div class="form-group">

                  <select id="subkategori" class="form-control" name="id_subkategori" required>
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
        @if ($errors->has('id_kategori')) <p class="help-block">{{ $errors->first('id_kategori') }}</p> @endif
<br/>
  <label>Jenis</label>
    <div class="form-group">

                  <select id="jenis" class="form-control" name="id_jenis" >
                
                  
                  </select>
                </div>
     @if ($errors->has('id_jenis')) <p class="help-block">{{ $errors->first('id_jenis') }}</p> @endif
                  
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
          <th>Nama Produk</th>
          <th>Nama Brand</th>
          <th>Warna</th>
          <th>Detail Produk</th>
          <th>Berat</th>
          <th>Harga</th>
          <th>Potongan awal</th>
          <th>Kelipatan</th>
          <th>Diskon</th>
          <th>Foto Produk</th>
          <th>Subkategori</th>
          <th>Kategori</th>
          <th>Jenis</th>
          <th></th>



          <!-- <th>Nama produk</th>
          <th>Kategori</th> -->
          

 
        </tr>
      </thead>
      <tbody>
       
       @foreach ($produk as $row)
        <tr>
          <td>{{ $row->id_produk }}</td>
          <td>{{ $row->nama_produk }}</td>
          <td>{{ $row->brand->nama_brand}}</td>
          <td>{{ $row->warna }}</td>
          <td>{{ $row->detail_produk }}</td>
          <td>{{ $row->berat }}</td>
          <td>{{ $row->harga }}</td>
          <td>{{ $row->startpotongan }}</td>
          <td>{{ $row->kelipatanpotongan }}</td>
          <td>{{ $row->potonganharga }}</td>
           <td>@foreach ($row->fotoproduk as $rows)
           <img src="https://drive.google.com/uc?export=view&id={{substr($rows->link_fotoproduk,33)}}" style="width: 40%" >
           @endforeach
           </td>
              <td>{{ $row->jenis->kategori->subkategori->nama_subkategori}}</td>
              <td>{{ $row->jenis->kategori->nama_kategori}}</td>
              <td>{{ $row->jenis->nama_jenis}}</td>


    

          <td>
            <a class="btn btn-edit" href="{{ url('produkadmin/edit/'.$row->id_produk) }}"><i class="fa fa-edit"></i>Edit</a>
            
         </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    </div>
    




    <script type="text/javascript">
      var counter = 1;
var limit = 5;
function addInput(divName){
     if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          var newdiv = document.createElement('div');
          newdiv.innerHTML = "Entry "  + " <br><input type='text' class='form-control' name='link_fotoproduk[]'>";
          document.getElementById(divName).appendChild(newdiv);
          counter++;
     }
}
    </script>
    @endsection


        @section('js')
<script type="text/javascript">
  $('#subkategori').change(function(){ 
    var id_kategori;
 $.get('kategoriadmin/kategori/' + $(this).val(), function(data){  
         $('#kategori').empty(); id_kategori = data[0].id_kategori; console.log(id_kategori);
         $.get('jenisadmin/jenis/' + id_kategori, function(data){  
         $('#jenis').empty();
        $.each(data, function(index, data){
          $('#jenis').append('<option value="'+data.id_jenis+'" >'+data.nama_jenis+'</option>');
        });
      });
        $.each(data, function(index, data){
          $('#kategori').append('<option value="'+data.id_kategori+'" >'+data.nama_kategori+'</option>');
        });
      });
  
  })
  $('#kategori').change(function(){
 $.get('jenisadmin/jenis/' + $(this).val(), function(data){  
         $('#jenis').empty();
        $.each(data, function(index, data){
          $('#jenis').append('<option value="'+data.id_jenis+'" >'+data.nama_jenis+'</option>');
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
