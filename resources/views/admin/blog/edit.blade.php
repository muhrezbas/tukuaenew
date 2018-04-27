@extends('admin.admin_template')



@section('content')
<div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               blog
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
          </div>
          
         <form method="post" action="{{ url('blogadmin/update/'.$blog->id_blog) }}" style="margin-left:10px">
          <div class="row">
    {{ csrf_field() }}
    <div class="col-lg-12 col-md-12 col-sm-12">
     <label> Judul Artikel</label>
    <input type="text" class="form-control" name="judul_blog" value="{{ $blog->judul_blog }}" placeholder="Judul blog" >
<br/>
 <label> Penulis</label>
    <input type="text" class="form-control" name="penulis" value="{{ $blog->penulis }}" placeholder="Link blog (maksimal 50 karakter)" maxlength=50 required>
<br/>
<!-- <label> Dituju untuk apa?</label>
    <input type="text" class="form-control" name="buatsiapa" value="{{ $blog->buatsiapa }}" placeholder="Pembuat (maksimal 50 karakter)" maxlength=50 required>
<br/> -->
<label>Brand</label>
    <div class="form-group">

                  <select class="form-control"  name="id_brand" required>
                  @foreach ($brand as $brand)
                   <option @if ($blog->id_brand == $brand->id_brand) selected @endif value="{{$brand->id_brand}}">{{$brand->nama_brand}}</option>
                  @endforeach
                  </select>
                </div>
<label> Thumbnail</label>
    <input type="text" class="form-control" name="thumbnail" value="{{ $blog->thumbnail }}" placeholder="thumbnail">
<br/>
<label> Deskripsi</label>
    <textarea type="text" class="form-control" name="deskripsi_artikel" id="summary-ckeditor2">{!! $blog->deskripsi_artikel !!}</textarea>
<br/>
<label> Isi Artikel</label>
    <textarea type="text" class="form-control" name="artikel" id="summary-ckeditor">{!! $blog->artikel !!}</textarea>
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
    <script>
    CKEDITOR.replace( 'summary-ckeditor' );
    CKEDITOR.replace( 'summary-ckeditor2' );

</script>
@endsection