@extends('admin.admin_template')



@section('content')
<div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               transaksi
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
          </div>
          
         <form method="post" action="{{ url('pembayaranadmin/update/'.$transaksi->id_transaksi) }}" style="margin-left:10px">
          <div class="row">
    {{ csrf_field() }}
    <div class="col-lg-12 col-md-12 col-sm-12">
  <label> Kode Transaksi</label>
    <input type="text" class="form-control" name="kode" value="{{ $transaksi->kode }}" placeholder="Kode transaksi (maksimal 50 karakter)" maxlength=50 required>
    
<br/>

<label> ID pembeli</label>
    <input type="text" class="form-control" name="id_pembeli" value="{{ $transaksi->id_pembeli }}" placeholder="ID pembeli (maksimal 10 karakter)" maxlength=10 required>
    
<br/>
<label> Tanggal</label>
    <input type="text" class="form-control" name="tanggal" value="{{ $transaksi->tanggal }}" placeholder="Tanggal (maksimal 50 karakter)" maxlength=50 required>
    
<br/>
<label> Bank ditransfer</label>
    <input type="text" class="form-control" name="bank" value="{{ $transaksi->rekening->nama_bank }}" placeholder="Bank (maksimal 50 karakter)" maxlength=50 required>
    
<br/>
<label> Harga</label>
    <input type="text" class="form-control" name="total_harga" value="{{($transaksi->total_harga) }}" placeholder="Total harga">
    
<br/>
<label>Status</label>
<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            

                           
                                <select name ="status" class="form-control">
                @if ($transaksi->status=="menunggu pembayaran")              
               <option value="{{$transaksi->status}}">{{$transaksi->status}}      </option>
                <option value="telah dibayar">telah dibayar     </option>
                <option value="menunggu admin">menunggu admin     </option>
                <option value="proses kirim">proses kirim     </option>
                <option value="telah sampai">telah sampai     </option>
                <option value="gagal">gagal    </option>
                @elseif($transaksi->status=="telah dibayar") 
               
                <option value="{{$transaksi->status}}">{{$transaksi->status}}      </option>
                 <option value="menunggu pembayaran">menunggu pembayaran     </option>
                 <option value="menunggu admin">menunggu admin     </option>
                 <option value="proses kirim">proses kirim     </option>
                <option value="telah sampai">telah sampai     </option>
                <option value="gagal">gagal    </option>
                @elseif($transaksi->status=="proses kirim") 
               
                <option value="{{$transaksi->status}}">{{$transaksi->status}}      </option>
                 <option value="menunggu pembayaran">menunggu pembayaran     </option>
                 <option value="menunggu admin">menunggu admin     </option>
                 <option value="telah dibayar">telah dibayar     </option>
                <option value="telah sampai">telah sampai     </option>
                <option value="gagal">gagal    </option>
                @elseif($transaksi->status=="telah sampai") 
               
                <option value="{{$transaksi->status}}">{{$transaksi->status}}      </option>
                 <option value="menunggu pembayaran">menunggu pembayaran     </option>
                 <option value="menunggu admin">menunggu admin     </option>
                 <option value="telah dibayar">telah dibayar     </option>
                 <option value="proses kirim">proses kirim     </option>
                
                <option value="telah dibayar">gagal    </option>
                @elseif($transaksi->status=="gagal") 
               
                <option value="{{$transaksi->status}}">{{$transaksi->status}}      </option>
                 <option value="menunggu pembayaran">menunggu pembayaran     </option>
                 <option value="menunggu admin">menunggu admin     </option>
                  <option value="telah dibayar">telah dibayar    </option>
                 <option value="proses kirim">proses kirim     </option>
                <option value="telah sampai">telah sampai     </option>
                @elseif($transaksi->status=="menunggu admin") 
               
                <option value="{{$transaksi->status}}">{{$transaksi->status}}      </option>
                 <option value="menunggu pembayaran">menunggu pembayaran     </option>
                  <option value="telah dibayar">telah dibayar     </option>
                 <option value="proses kirim">proses kirim     </option>
                <option value="telah sampai">telah sampai     </option>
                <option value="gagal">gagal    </option>
               
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