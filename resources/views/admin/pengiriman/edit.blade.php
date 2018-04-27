@extends('admin.admin_template')



@section('content')
<div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               pengiriman
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
          </div>
          
         <form method="post" action="{{ url('pengiriman/update/'.$pengiriman->id_pengiriman) }}" style="margin-left:10px">
          <div class="row">
    {{ csrf_field() }}
    <div class="col-lg-12 col-md-12 col-sm-12">
  <label> ID transaksi</label>
    <input type="text" class="form-control" name="id_transaksi" value="{{ $pengiriman->transaksi->id_transaksi }}" placeholder="Kode transaksi (maksimal 50 karakter)" maxlength=50 required>
    
<br/>
<label> Alamat</label>
    <input type="text" class="form-control" name="alamat" value="{{ $pengiriman->alamat}}" placeholder="Alamat">
    
<br/>
<label> Harga Ongkir</label>
    <input type="text" class="form-control" name="ongkir" value="{{($pengiriman->ongkir) }}" placeholder="ongkir">
    
<br/>
<label> Kode Pos</label>
    <input type="text" class="form-control" name="kodepos" value="{{ $pengiriman->kodepos}}" placeholder="kodepos (maksimal 5 karakter)" maxlength=5 required>
    
<br/>
<label> Berat</label>
    <input type="text" class="form-control" name="berat" value="{{ $pengiriman->berat}}" placeholder="Berat ">
    
<br/>

<label> Tanggal</label>
    <input type="date" class="form-control" name="tanggal" value="{{ $pengiriman->tanggal }}" placeholder="Tanggal (maksimal 50 karakter)" maxlength=50 required>
    
<br/>


<label>no resi</label>
<input type="text" class="form-control" name="no_resi" value="{{ $pengiriman->no_resi }}" placeholder="Nomor Resi">
<label>Status</label>
<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            

                           
                                <select name ="status" class="form-control">
                @if ($pengiriman->status=="menunggu konfirmasi")              
               <option value="{{$pengiriman->status}}">{{$pengiriman->status}}      </option>
                <option value="proses dikirim">proses dikirim     </option>
                <option value="telah sampai">telah sampai</option>
                <option value="batal kirim">batal kirim</option>

                @elseif($pengiriman->status=="proses dikirim") 
               
                <option value="{{$pengiriman->status}}">{{$pengiriman->status}}      </option>
                <option value="menunggu konfirmasi">menunggu konfirmasi</option>
                 <option value="telah sampai">telah sampai</option>
                <option value="batal kirim">batal kirim</option>
                  @elseif($pengiriman->status=="batal kirim") 
               
                <option value="{{$pengiriman->status}}">{{$pengiriman->status}}      </option>
                <option value="menunggu konfirmasi">menunggu konfirmasi</option>
                <option value="proses dikirim">proses dikirim     </option>
                 <option value="telah sampai">telah sampai</option>
                 @else
                 <option value="{{$pengiriman->status}}">{{$pengiriman->status}}      </option>
                 <option value="menunggu konfirmasi">menunggu konfirmasi</option>
                 <option value="proses dikirim">proses dikirim     </option>
                    <option value="batal kirim">batal kirim</option>
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