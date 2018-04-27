@extends('admin.admin_template')





@section('content')
<div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               Video
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
          </div>
          
         <form method="post" action="{{ url('videoadmin/update/'.$video->id_video) }}" style="margin-left:10px">
          <div class="row">
    {{ csrf_field() }}
    <div class="col-lg-12 col-md-12 col-sm-12">
      <label> Judul Video</label>
    <input type="text" class="form-control" name="judul_video" value="{{ $video->judul_video }}" placeholder="Judul Video (maksimal 50 karakter)" maxlength=50 required>
<br/>
 <label> Link Video</label>
    <input type="text" class="form-control" name="link_video" value="{{ $video->link_video }}" placeholder="Link Video (maksimal 200 karakter)" maxlength=200 required>
<br/>
<!--  <label> Pembuat</label>
    <input type="text" class="form-control" name="pembuat" value="{{ $video->pembuat }}" placeholder="Pembuat (maksimal 50 karakter)" maxlength=50 required>
<br/> -->
<label>Brand</label>
    <div class="form-group">

                  <select class="form-control"  name="id_brand" required>
                  @foreach ($brand as $brand)
                   <option @if ($video->id_brand == $brand->id_brand) selected @endif value="{{$brand->id_brand}}">{{$brand->nama_brand}}</option>
                  @endforeach
                  </select>
                </div>
<label> Source Video</label>
    <input type="text" class="form-control" name="sourcevideo" value="{{ $video->sourcevideo }}" placeholder="Pembuat (maksimal 20 karakter)" maxlength=20 required>
<br/>
<label> Deskripsi</label>
    <textarea type="text" class="form-control" name="deskripsi" id="summary-ckeditor">{{ $video->deskripsi }}</textarea>
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
 

</script>
  @endsection