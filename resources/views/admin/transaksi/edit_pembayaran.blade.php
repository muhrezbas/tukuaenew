@extends('admin.admin_template')



@section('content')
<div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               pembayaran
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
          </div>
          
         <form method="post" action="{{ url('konfirmasipembayaranadmin/update/'.$pembayaran->id_pembayaran) }}" style="margin-left:10px">
          <div class="row">
    {{ csrf_field() }}
    <div class="col-lg-12 col-md-12 col-sm-12">
  <label> Kode transaksi</label>
    <input type="text" class="form-control" name="kode" value="{{ $pembayaran->transaksi->kode }}" placeholder="Kode transaksi (maksimal 50 karakter)" maxlength=50 required>
    
<br/>


<label> Tanggal</label>
    <input type="text" class="form-control" name="tanggal" value="{{ $pembayaran->tanggal }}" placeholder="Tanggal (maksimal 50 karakter)" maxlength=50 required>
    
<br/>
<label> Bank pembeli</label>
    <input type="text" class="form-control" name="bank_pembeli" value="{{ $pembayaran->bank_pembeli}}" placeholder="Bank (maksimal 50 karakter)" maxlength=50 required>
    
<br/>
<label> rekening pembeli</label>
    <input type="text" class="form-control" name="rekening_pembeli" value="{{ $pembayaran->rekening_pembeli}}" placeholder="Bank (maksimal 50 karakter)" maxlength=50 required>
    
<br/>
<label> atas nama pembeli</label>
    <input type="text" class="form-control" name="atas_nama_pembeli" value="{{ $pembayaran->atas_nama_pembeli}}" placeholder="Bank (maksimal 50 karakter)" maxlength=50 required>
    
<br/>
<label> Nominal transfer</label>
    <input type="text" class="form-control" name="nominal" value="{{($pembayaran->nominal) }}" placeholder="nominal">
    
<br/>
<label> bukti</label>
<br/>
<img src="http://localhost:8080/laravel/public/storage/{{$pembayaran->bukti}}" /><
<br/>
<label>Status</label>
<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            

                           
                                <select name ="status" class="form-control">
                @if ($pembayaran->status=="menunggu konfirmasi admin")              
               <option value="{{$pembayaran->status}}">{{$pembayaran->status}}      </option>
                <option value="telah dikonfirmasi">telah dikonfirmasi     </option>
                <option value="ditolak">ditolak</option>
                @elseif($pembayaran->status=="telah dikonfirmasi") 
               
                <option value="{{$pembayaran->status}}">{{$pembayaran->status}}      </option>
                 <option value="menunggu konfirmasi admin">menunggu konfirmasi admin </option>
                 <option value="ditolak">ditolak </option>

                 @else
                 <option value="{{$pembayaran->status}}">{{$pembayaran->status}}      </option>
                 <option value="menunggu konfirmasi admin">menunggu konfirmasi admin </option>
                  <option value="telah dikonfirmasi">telah dikonfirmasi     </option>
               @endif
                


                
                                </select>

                              
                            </div>
    
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