 <!-- *** LEFT COLUMN ***
            _________________________________________________________ -->

                    <div class="col-sm-3">

                        <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                        <div class="panel panel-default sidebar-menu">

                            <div class="panel-heading">
                                <h3 class="panel-title">Categories</h3>
                            </div>

                            <div class="panel-body">
                                <ul class="nav nav-pills nav-stacked category-menu">
                                  @foreach ($subkategori as $row)
                                    <li >
                                   
                                        <a href="{{url('content/'.$row->nama_subkategori)}}">{{$row->nama_subkategori}} <span class="badge pull-right">{{$row->getProduk($row->id_subkategori)}}</span></a>
                                        <ul>
                                        @foreach ($row->kategori as $rows)
                                             <li><a href="{{url('content/'.$row->nama_subkategori.'/'.$rows->nama_kategori)}}">{{$rows->nama_kategori}}</a>
                                            </li>
                                         @endforeach   
                                        </ul>
                                    </li>
                                    @endforeach
                                     
                   
                                  
                                </ul>

                            </div>
                        </div>

                        <div class="panel panel-default sidebar-menu">

                            <div class="panel-heading">
                                <h3 class="panel-title">Brands</h3>
                                <a class="btn btn-xs btn-danger pull-right"  id ="clear" href="#"><i class="fa fa-times-circle"></i> <span class="hidden-sm">Clear</span></a>
                            </div>

                            <div class="panel-body">

                            
                                  <form method="post" id="filterbrand" action="{{ url('product/filterbrand') }}" >
                            {{ csrf_field() }}
                                    <div class="form-group">
                                        @foreach ($brand as $brand)
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="check filterbrand" name="brand[]" value="{{$brand->id_brand}}">{{$brand->nama_brand}} ({{$brand->produk[0]->getTotal($brand->id_brand)}})
                                            </label>
                                        </div>
                                        @endforeach
                                       
                                    </div>

                                    <button type="submit" class="btn btn-default btn-sm btn-template-main"><i class="fa fa-pencil"></i> Apply</button>

                                </form>

                            </div>
                        </div>

                       

                        <!-- *** MENUS AND FILTERS END *** -->

                        <div class="banner">
                            <a href="">
                                <img src="img/banner.jpg" alt="sponsor" class="img-responsive">
                            </a>
                        </div>
                        <!-- /.banner -->

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** LEFT COLUMN END *** -->

                    <!-- *** RIGHT COLUMN ***
            _________________________________________________________ -->
