@extends('admin.admin_template')



@section('content')
<div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
              edit detail transaksi
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
          </div>
          
         <form method="post" action="{{ url('pembayaranadmin/detail/update/'.$detail_transaksi->id_detail_transaksi) }}" style="margin-left:10px">
          <div class="row">
    {{ csrf_field() }}
    <div class="col-lg-12 col-md-12 col-sm-12">
  <label> Nama Produk</label>
    <input type="text" disabled="disabled" class="form-control" name="nama_produk" value="{{ $detail_transaksi->ukuran->produk->nama_produk }}" placeholder="nama produk" required>
    
<br/>

<label> Nama Brand</label>
    <input type="text"  disabled="disabled" class="form-control" name="nama_brand" value="{{ $detail_transaksi->ukuran->produk->brand->nama_brand }}" placeholder="nama_brand"required>
    
<br/>
<label> Edit Jumlah</label>
    <input type="text" class="form-control" name="jumlah" value="{{ $detail_transaksi->jumlah }}" placeholder="jumlah"  required>
    
<br/>
<label> Harga</label>
    <input type="text" class="form-control" name="total_harga" value="{{($detail_transaksi->total_harga) }}" placeholder="Total harga">
    
<br/>

                              
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