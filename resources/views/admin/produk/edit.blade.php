@extends('admin.admin_template')



@section('content')
<div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               produk
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
          </div>
          
         <form method="post" action="{{ url('produkadmin/update/'.$produk->id_produk) }}" style="margin-left:10px">
          <div class="row">
    {{ csrf_field() }}
    <div class="col-lg-12 col-md-12 col-sm-12">
  <label> Nama produk</label>
    <input type="text" class="form-control" name="nama_produk" value="{{ $produk->nama_produk }}" placeholder="Nama produk (maksimal 50 karakter)" maxlength=50 required>
    
<br/>
<label>Brand</label>
    <div class="form-group">

                  <select class="form-control"  name="id_brand" required>
                  @foreach ($brand as $brand)
                   <option @if ($produk->id_brand == $brand->id_brand) selected @endif value="{{$brand->id_brand}}">{{$brand->nama_brand}}</option>
                  @endforeach
                  </select>
                </div>

<label> Warna</label>
    <input type="text" class="form-control" name="warna" value="{{ $produk->warna }}" placeholder="Nama produk (maksimal 50 karakter)" maxlength=50 required>
    
<br/>
<label> Detail Produk</label>
    <input type="text" class="form-control" name="detail_produk" value="{{ $produk->detail_produk }}" placeholder="Detail produk">
    
<br/>
<label> Berat</label>
    <input type="text" class="form-control" name="berat" value="{{ $produk->berat }}" placeholder="" mrequired>
    
<br/>
  @if ($errors->has('berat')) <p class="help-block">{{ $errors->first('berat') }}</p> @endif
     



    
<label> Harga</label>
    <input type="text" class="form-control" name="harga" value="{{ $produk->harga }}" placeholder="Nama produk "  >
     @if ($errors->has('harga')) <p class="help-block">{{ $errors->first('harga') }}</p> @endif
    
<br/>
<label> Jumlah potongan awal barang </label>
    <input type="text" class="form-control" value="{{ $produk->startpotongan }}" name="startpotongan" placeholder="Angka" >
       @if ($errors->has('startpotongan')) <p class="help-block">{{ $errors->first('startpotongan') }}</p> @endif
<br/>
<label> Jumlah kelipatan barang</label>
    <input type="text" class="form-control" value="{{ $produk->kelipatanpotongan }}" name="kelipatanpotongan" placeholder="Angka" >
     @if ($errors->has('kelipatanpotongan')) <p class="help-block">{{ $errors->first('kelipatanpotongan') }}</p> @endif
    
<br/>
<label> Diskon</label>
    <input type="text" class="form-control" value="{{ $produk->potonganharga }}" name="potonganharga" placeholder="Percent (maksimal 3 karakter)" maxlength=3 >
     @if ($errors->has('potonganharga')) <p class="help-block">{{ $errors->first('potonganharga') }}</p> @endif
<br/>
<label> Foto Produk</label>
<div id="fotoproduk" class="col-md-12">
 @foreach ($produk->fotoproduk as $nomor=>$fotoproduk)

   <div id="dynamicInput{{$nomor+1}}" >
      <div class="col-md-11">
      
          Entry <br><input type="text" value="{{$fotoproduk->link_fotoproduk}}" class="form-control" name="link_fotoproduk[]">
          <input type="hidden"  class="form-control" value="{{$fotoproduk->id_fotoproduk}}" name="id_fotoproduk[]">
          
     </div>

     <div class="col-md-1">
          </br>
          <input id="{{$nomor+1}}" type="button"  class="btn-danger hapus" value="Delete">
     </div>
   </div>

 @endforeach
</div>
<br/>
     <input type="button" id="tambah" value="Add another text input">
    
<br/>
<br/>
<br/>
<label>Subkategori</label>
    <div class="form-group">

                  <select id="subkategori" class="form-control" name="id_subkategori">
                   <option></option>
                  @foreach ($subkategori as $no=>$subkategori)
                    <option @if ($produk->jenis->kategori->id_subkategori == $subkategori->id_subkategori) selected @endif value="{{$subkategori->id_subkategori}}">{{$subkategori->nama_subkategori}}</option>
                  @endforeach
                  </select>
                </div>
<br/>
  <label>Kategori</label>
    <div class="form-group">

                  <select id="kategori" class="form-control" name="id_kategori">
                   <option></option>
                  @foreach ($kategori as $no=>$kategori)
                    <option @if ($produk->jenis->id_kategori == $kategori->id_kategori) selected @endif value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                  @endforeach
                  </select>
                </div>
<br/>
    @if ($errors->has('id_kategori')) <p class="help-block">{{ $errors->first('id_kategori') }}</p> @endif
  <label>Jenis</label>
    <div class="form-group">

                  <select id="jenis" class="form-control" name="id_jenis">
                  
                  @foreach ($jenis as $jenis)
               <option @if ($produk->id_jenis == $jenis->id_jenis) selected @endif value="{{$jenis->id_jenis}}">{{$jenis->nama_jenis}}</option>
                  @endforeach
                  </select>
                </div>
    

  @if ($errors->has('id_jenis')) <p class="help-block">{{ $errors->first('id_jenis') }}</p> @endif
<br/>



  </div>
</div>

  <div class="row">
<div class="col-lg-4 col-md-4 col-sm-4">
    <button type="submit"  class="btn btn-fw btn-info waves-effect waves-effect">Simpan</button>
  </div>
  </div>
    </form>

    </div>
  </div>

@endsection
@section('js')

    <script type="text/javascript">
      var counter = parseInt('{{$nomor}}')+1;
var limit = 5;
$('#tambah').click(function(){
  if (counter == limit)  {
          alert("You have reached the limit of adding " + counter + " inputs");
     }
     else {
          
         $('#fotoproduk').append("<div id='dynamicInput+counter+1'> <div class='col-md-11'> Entry "  + " <br><input type='text' class='form-control' name='link_fotoproduk[]'> <input type='hidden'  class='form-control'  name='id_fotoproduk[]''></div><div class='col-md-1'></br><input id='{{$nomor+1}}'' type='button'  class='btn-danger hapus'0 value='Delete'></div></div>");
          counter++;
     }
})
$('.hapus').click(function(){
  $('#dynamicInput'+$(this).attr( 'id' )).remove()
  counter--
  })
 </script>

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
  $('#kategori').change(function(){
 $.get('/laravel/public/jenisadmin/jenis/' + $(this).val(), function(data){  
         $('#jenis').empty();
        $.each(data, function(index, data){
          $('#jenis').append('<option value="'+data.id_jenis+'" >'+data.nama_jenis+'</option>');
        });
      });
  })
</script>

    @endsection