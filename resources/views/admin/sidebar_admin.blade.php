<!-- Left side column. contains the sidebar -->

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{url('universal/img/tukuaesmall.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
        <p>Admin TUKUAE</p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
                   
        <!-- search form (Optional) -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
<span class="input-group-btn">
  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            
            <li class=""><a href="{{ url('admin') }}"> <i class="fa fa-dashboard"></i><span>Beranda</span></a></li>
            <li class="treeview">
                <a href="#"> <i><i class="fa fa-tag"></i> </i><span>Kelola kategori</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                     <li><a href="{{ url('subkategoriadmin') }}">  <i class="fa fa-list"></i><span>Subkategori produk</span></a></li>
                     <li><a href="{{ url('kategoriadmin') }}">  <i class="fa fa-list"></i><span>Kategori produk</span></a></li>
                     <li><a href="{{ url('jenisadmin') }}">  <i class="fa fa-list"></i><span>Jenis produk</span></a></li>
                </ul>
            </li>
             <li class="treeview">
                <a href="#"> <i><i class="fa fa-product-hunt"></i> </i><span>Produk</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                <li><a href="{{ url('ukuran') }}">  <i class="fa fa-th-large"></i><span>Ukuran produk</span></a></li>  
                <li><a href="{{ url('produkadmin') }}">  <i class="fa fa-shopping-bag"></i><span>Kelola Produk</span></a></li> 

                </ul>
            </li>
          
            
            <li><a href="{{ url('brandadmin') }}">  <i class="fa fa-shopping-cart"></i><span>Brand</span></a></li>   
             <li><a href="{{ url('rekeningadmin') }}">  <i class="fa fa-credit-card"></i><span>Rekening</span></a></li>   
            <li class="treeview">
                <a href="#"> <i><i class="fa fa-handshake-o"></i> </i><span>Transaksi</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li ><a href="{{ url('pembayaranadmin') }}"><i class="fa fa-handshake-o"></i> Kelola transaksi</a></li>
                    <li><a href="{{ url('konfirmasipembayaranadmin') }}"><i class="fa fa-handshake-o"></i> Kelola pembayaran</a></li>
             
                </ul>
            </li>
            <li><a href="{{ url('pengiriman') }}"> <i class="fa fa-truck" ></i> <span>Pengiriman</span></a></li>
            <li><a href="{{ url('blogadmin') }}"> <i class="fa fa-pencil" ></i> <span>Article</span></a></li>
            <li><a href="{{ url('videoadmin') }}"> <i class="fa fa-video-camera" ></i> <span>Video Review</span></a></li>
            <!-- <li><a href="{{ url('customer')}}"> <i class="fa fa-user"></i> <span>User</span></a></li> -->
            <li class="treeview">
                <a href="#"> <i class="fa fa-user"></i><span>User</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('customer') }}">Data User</a></li>
                    
                </ul>
            </li>
           
        </ul>
        
</section>
    
    <!-- /.sidebar-menu
    </section>
    <!-- /.sidebar -->
</aside>