<div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
        @if(\Request::url() === 'http://localhost:8080/laravel/public/login')
     <h1>New account / Sign in</h1>
     @elseif(\Request::url() === 'http://localhost:8080/laravel/public/content')
      <h1>HOME</h1>
      @elseif(\Request::url() === 'http://localhost:8080/laravel/public/product')
      <h1>WHITE BLOUSE ARMANI</h1>
      @elseif(Route::currentRouteName()=="produk")
       <h1>{{$tampilkan[0]->produk->nama_produk}}</h1>
       @elseif(Route::currentRouteName()=="blogmedium")
        <h1>ARTICLE</h1>
       @elseif(Route::currentRouteName()=="blog")
       <h1>{{$tampilkanblog->judul_blog}}</h1>
           @elseif(Route::currentRouteName()=="video")
       <h1>Video Review</h1>
       @elseif(\Request::url() === 'http://localhost:8080/laravel/public/content/men')
       <h1>MEN</h1>
       @elseif(\Request::url() === 'http://localhost:8080/laravel/public/content/women')
       <h1>WOMEN</h1>
       @elseif(\Request::url() === 'http://localhost:8080/laravel/public/content/lifestyle')
                            <h1>LIFESTYLE</h1>
       @elseif(\Request::url() === 'http://localhost:8080/laravel/public/content/kids')
                            <H1>KIDS</h1> 
       @elseif(Route::currentRouteName()=="cart")
       <h1>SHOPPING CART</h1>
       @elseif(Route::currentRouteName()=="cart")
       <h1>SHOPPING CART</h1>
@elseif(Route::currentRouteName()=="alamat")
        <h1>CHECKOUT - ADDRESS</h1>
         @elseif(Route::currentRouteName()=="ongkir")
         <h1>CHECKOUT - DELIVERY METHOD </h1>
         @elseif(Route::currentRouteName()=="bayar")
         <h1>CHECKOUT - PAYMENT METHOD</h1>
          @elseif(Route::currentRouteName()=="review")
          <h1>CHECKOUT - ORDER REVIEW</h1> 
           @elseif(Route::currentRouteName()=="detail")
          <h1>ORDER REVIEW</h1> 
           @elseif(Route::currentRouteName()=="konfirmasi")
         <h1>PAYMENT CONFIRMATION </h1>
             @elseif(Route::currentRouteName()=="history")
       <h1>HISTORY</h1>
    @elseif(Route::currentRouteName()=="content")
        @if(Request::route('nama_jenis')!=null)

        <h1>{{Request::route('nama_jenis')}}</h1> 

        @elseif(Request::route('nama_kategori')!=null)

        <h1>{{Request::route('nama_kategori')}}</h1>

        @elseif(Request::route('nama_subkategori')!=null)

        <h1>{{Request::route('nama_subkategori')}}</h1>   
    
       
        @endif
    @elseif(Route::currentRouteName()=="brand")
        @if(Request::route('nama_brand')!=null)

        <h1>{{Request::route('nama_brand')}}</h1> 

    
       
        @endif
          


@endif

                       
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="{{url('/')}}">Home</a>
                            </li>
                            @if(\Request::url() === 'http://localhost:8080/laravel/public/login')
                            <li>New account / Sign in</li>
                              @elseif(\Request::url() === 'http://localhost:8080/laravel/public/content')
                             
                            
                               @elseif(Route::currentRouteName()=="blogmedium")
                               <li>ARTICLE</li>
                                @elseif(Route::currentRouteName()=="produk")
                             <li><a href="index.html">{{$tampilkan[0]->produk->jenis->kategori->subkategori->nama_subkategori}}</a></li>
                             <li><a href="{{url('content/')}}">{{$tampilkan[0]->produk->jenis->kategori->nama_kategori}}</a></li>
                              <li><a href="{{url('content/')}}">{{$tampilkan[0]->produk->jenis->nama_jenis}}</a></li>
                              <li>{{$tampilkan[0]->produk->nama_produk}}</li>
                              @elseif(Route::currentRouteName()=="blog")
                  
                              <li><a href="index.html">REVIEW</a></li>
                              <li>{{$tampilkanblog->judul_blog}}</li>
                              @elseif(Route::currentRouteName()=="video")
                              <li>Video Review</li>
                               @elseif(\Request::url() === 'http://localhost:8080/laravel/public/content/men')
                            <li>MEN</li>
                             @elseif(\Request::url() === 'http://localhost:8080/laravel/public/content/women')
                            <li>WOMAN</li>
                            @elseif(\Request::url() === 'http://localhost:8080/laravel/public/content/kids')
                            <li>KIDS</li>
                            @elseif(\Request::url() === 'http://localhost:8080/laravel/public/content/lifestyle')
                            <li>LIFESTYLE</li>
                            @elseif(Route::currentRouteName()=="cart")
                            <li>SHOPPING CART</li>
                            @elseif(Route::currentRouteName()=="alamat")
                            <li>CHECKOUT - ADDRESS</li>
                            @elseif(Route::currentRouteName()=="ongkir")
                            <li>CHECKOUT - DELIVERY METHOD </li>
                            @elseif(Route::currentRouteName()=="bayar")
                            <li>CHECKOUT - PAYMENT METHOD</li>
                            @elseif(Route::currentRouteName()=="review")
                            <li>CHECKOUT - ORDER REVIEW</li>
                             @elseif(Route::currentRouteName()=="detail")
                            <li>ORDER REVIEW</li>
                              @elseif(Route::currentRouteName()=="content")
        @if(Request::route('nama_jenis')!=null)

        <li>{{Request::route('nama_subkategori')}}</li> <li>{{Request::route('nama_kategori')}}</li> <li>{{Request::route('nama_jenis')}}</li> 

        @elseif(Request::route('nama_kategori')!=null)

        <li>{{Request::route('nama_subkategori')}}</li> <li>{{Request::route('nama_kategori')}}</li>

        @elseif(Request::route('nama_subkategori')!=null)
         <li>{{Request::route('nama_subkategori')}}</li> <li>{{Request::route('nama_kategori')}}</li> <li>{{Request::route('nama_jenis')}}</li>       
        
       
        @endif
         @elseif(Route::currentRouteName()=="history")
       <li>HISTORY</li>
        @elseif(Route::currentRouteName()=="konfirmasi")
         <li>PAYMENT CONFIRMATION </li>
                               @elseif(Route::currentRouteName()=="brand")
        @if(Request::route('nama_brand')!=null)
              <li>{{Request::route('nama_brand')}}</li> 

    
       
        @endif

                            @endif
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>