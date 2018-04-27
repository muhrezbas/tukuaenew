@extends('admin.admin_template')



@section('content')
<div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               brand
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
          </div>
          
         <form method="post" action="{{ url('brandadmin/update/'.$brand->id_brand) }}" style="margin-left:10px">
          <div class="row">
    {{ csrf_field() }}
<div class="col-lg-12 col-md-12 col-sm-12">
     <label> Nama Brand</label>
    <input type="text" class="form-control" name="nama_brand" value="{{ $brand->nama_brand }}" placeholder="Judul brand (maksimal 50 karakter)" maxlength=50 required>
<br/>
 <label> Informasi Brand</label>
    <input type="text" class="form-control" value="{{ $brand->informasi_brand }}" name="informasi_brand" placeholder="Informasi brand">
    
<br/>
<label> Rating</label>
<br/>
@foreach($brand->rating as $nomor=>$nilairating)
<div id="dynamicInput{{$nomor+1}}" >

 
          Rating<br><input type="text"  class="form-control" value=" {{$nilairating->rating}}" name="rating[]" placeholder="Rating (maksimal 1 karakter)" maxlength=1 required>
    
        
          Feedback<br><input type="text"  class="form-control" value=" {{$nilairating->feedback}}" name="feedback[]" placeholder="Feedback ">
          <input  type="hidden" value="{{$nilairating->id_rating}}" name="id_rating[]">
 </div>
@endforeach
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
}
    </script>
    @endsection