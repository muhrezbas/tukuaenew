@extends('admin.admin_template')



@section('content')
<div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               kategori
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
          </div>
          
         <form method="post" action="{{ url('kategoriadmin/update/'.$kategori->id_kategori) }}" style="margin-left:10px">
          <div class="row">
    {{ csrf_field() }}
    <div class="col-lg-12 col-md-12 col-sm-12">
  <label> Nama kategori</label>
    <input type="text" class="form-control" name="nama_kategori" value="{{ $kategori->nama_kategori }}" placeholder="Nama kategori (maksimal 50 karakter)" maxlength=50 required>
<br/>
<label>Subkategori</label>
    <div class="form-group">

                  <select id="subkategori" class="form-control" name="id_subkategori">
                   <option></option>
                  @foreach ($subkategori as $no=>$subkategori)
                    <option @if ($kategori->id_subkategori == $subkategori->id_subkategori) selected @endif value="{{$subkategori->id_subkategori}}">{{$subkategori->nama_subkategori}}</option>
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

   

    @endsection