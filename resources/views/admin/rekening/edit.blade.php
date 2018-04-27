@extends('admin.admin_template')



@section('content')
<div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               Rekening
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
          </div>
          
         <form method="post" action="{{ url('rekeningadmin/update/'.$rekening->id_rekening) }}" style="margin-left:10px">
          <div class="row">
    {{ csrf_field() }}
    <div class="col-lg-12 col-md-12 col-sm-12">
  
        <label> Nama Bank</label>
    <input type="text" value="{{ $rekening->nama_bank }}" class="form-control" name="nama_bank" placeholder="Nama Bank(maksimal 10 karakter)" maxlength=10 required>
  <br/>
    <label> Atas Nama</label>
    <input type="text" value="{{ $rekening->atasnama }}" class="form-control" name="atasnama" placeholder="Atas Nama(maksimal 30 karakter)" maxlength=30 required>
  <br/>
    <label> Nomor Rekening</label>
    <input type="text" value="{{ $rekening->no_rek }}" class="form-control" name="no_rek" placeholder="No Rekening(maksimal 30 karakter)" maxlength=30 required>
     @if ($errors->has('no_rek')) <p class="help-block">{{ $errors->first('no_rek') }}</p> @endif
    
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