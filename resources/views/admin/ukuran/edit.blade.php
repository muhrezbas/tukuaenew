@extends('admin.admin_template')



@section('content')
<div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               Ukuran
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
          </div>
          
         <form method="post" action="{{ url('ukuran/update/'.$ukuran->id_ukuran) }}" style="margin-left:10px">
          <div class="row">
    {{ csrf_field() }}
    <div class="col-lg-12 col-md-12 col-sm-12">
  
<label>produk</label>
    <div class="form-group">
                 <select class="form-control" name="id_produk" >
                  @foreach ($produk as $produk)
                    <option @if($ukuran->id_produk==$produk->id_produk) selected @endif value="{{$produk->id_produk}}">{{$produk->nama_produk}}</option>
                  @endforeach
                  </select>
                </div>
    
<br/>
    

   
<label> Nama Jenis Ukuran Produk</label>
    <input type="text" class="form-control" name="nama_ukuran" value="{{ $ukuran->nama_ukuran}}" placeholder= "Ukuran" required>
    
<br/>
<label> Stok Produk</label>
    <input type="text" class="form-control" name="stok_ukuran" value="{{ $ukuran->stok_ukuran}}"  placeholder="Nama produk (maksimal 100 karakter)" maxlength=100 required>
    @if ($errors->has('stok_ukuran')) <p class="help-block">{{ $errors->first('stok_ukuran') }}</p> @endif
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

   

    @endsection