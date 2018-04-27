@extends('admin.admin_template')



@section('content')
<div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               jenis
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
          </div>
          
         <form method="post" action="{{ url('jenisadmin/update/'.$jenis->id_jenis) }}" style="margin-left:10px">
          <div class="row">
    {{ csrf_field() }}
    <div class="col-lg-12 col-md-12 col-sm-12">
  <label> Nama jenis</label>
    <input type="text" class="form-control" name="nama_jenis" value="{{ $jenis->nama_jenis }}" placeholder="Nama jenis (maksimal 50 karakter)" maxlength=50 required>
<br/>
<label>Subkategori</label>
    <div class="form-group">

                  <select id="subkategori" class="form-control" name="id_subkategori">
                   <option></option>
                  @foreach ($subkategori as $no=>$subkategori)
                    <option @if ($jenis->kategori->id_subkategori == $subkategori->id_subkategori) selected @endif value="{{$subkategori->id_subkategori}}">{{$subkategori->nama_subkategori}}</option>
                  @endforeach
                  </select>
                </div>
<br/>
 <label>Kategori</label>
    <div class="form-group">

                  <select id="kategori" class="form-control" name="id_kategori">
                   <option></option>
                  @foreach ($kategori as $no=>$kategori)
                    <option @if ($jenis->id_kategori == $kategori->id_kategori) selected @endif value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                  @endforeach
                  </select>
                </div>
<br/>






  </div>
</div>

  <div class="row">
<div class="col-lg-4 col-md-4 col-sm-4">
    <button type="mit"  class="btn btn-fw btn-info waves-effect waves-effect">Simpan</button>
  </div>
  </div>
    </form>

    </div>
  </div>

@endsection
@section('js')
<script type="text/javascript">
  $('#subkategori').change(function(){ 
    var id_kategori;
 $.get('/laravel/public/kategoriadmin/kategori/' + $(this).val(), function(data){  
         $('#kategori').empty(); id_kategori = data[0].id_kategori; console.log(id_kategori);
         $.get('/laravel/public/jenisadmin/jenis/' + id_kategori, function(data){  
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
</script>
   

    @endsection