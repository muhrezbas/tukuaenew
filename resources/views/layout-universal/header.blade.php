 <header>
 <body>
    <div id="all">

            <!-- *** TOP ***
_________________________________________________________ -->
            <div id="top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5 contact">
                            <p class="hidden-md hidden-lg"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </p>
                        </div>
                        <div class="col-xs-7">
                       

                            <div class="login">
                            <ul style="list-style: none;" class="nav navbar-nav navbar-right">
                            @if (auth()-> user()!= NULL)
                            <li class="dropdown">
                                    <a style="padding:7px 0px; " id="" href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">TRANSACTION <b class="caret"></b></a>
                                    <div id="">
                                    <ul class="dropdown-menu">
                                        <li><a style="color: #555555" href="{{url('detail')}}">NOW</a>
                                        </li>
                                        <li><a  style="color: #555555" href="{{url('history/')}}">HISTORY</a>
                                        </li>


                                    </ul>
                                  </div>
                                </li>  
                            @endif
                                
                             
                             <li><a style="padding:7px 0px;cursor: pointer;" id="cart"  ><i class="fa fa-shopping-cart"></i> <span class="hidden-xs text-uppercase">Shopping Cart</span></a></li>
                            @if (auth()-> user()!= NULL)
                             <li><a  style="padding:7px 0px;"href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();"><i class="fa fa-user"></i> 
                              <span class="hidden-xs text-uppercase">Log Out</span></a></li>
                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                            @else
                            @if ((\Request::is('login'))) 
                            @else


                                <li><a style="padding:7px 0px;" href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Sign in</span></a></li>
                                <li><a style="padding:7px 0px;" href="{{ route('login') }}"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Sign up</span></a></li>
                                @endif
                            @endif
                            </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- *** TOP END *** -->

            <!-- *** NAVBAR ***
    _________________________________________________________ -->

            <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

                <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                    <div class="container">
                        <div class="navbar-header">

                            <a class="navbar-brand home" href="{{url('content')}}">
                                <img src="{{url('universal/img/tukuae.jpg')}}" alt="Pusat Grosir logo" class="hidden-xs hidden-sm">
                                <img src="{{url('universal/img/tukuaesmall.jpg')}}" alt="Pusat Grosir logo" style="width: 44px;" class="visible-xs visible-sm"><span class="sr-only">Universal - go to homepage</span>
                            </a>
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="fa fa-align-justify"></i>
                                </button>
                            </div>
                        </div>
                        <!--/.navbar-header -->

                        <div class="navbar-collapse collapse" id="navigation">

                            <ul class="nav navbar-nav navbar-right">
                             @foreach ($subkategori as $rows)
                                <li  class="dropdown yamm-fw">
                               
                                    <a id="women{{$rows->id_subkategori}}" href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">{{$rows->nama_subkategori}} <b class="caret"></b></a>
                                    <div id="women{{$rows->id_subkategori}}">
                                    <ul class="dropdown-menu">
                                      
                                         @foreach ($rows->kategori as $row)
                                                <li class="dropdown-submenu">
                                                            <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">{{$row->nama_kategori}} <b class="caret"></b></a>
                                    
                                                                    <ul class="dropdown-menu" style="top: 0;right: 100%;margin-top: -1px; min-width: 200px;">

                                                            
                                                                    @foreach ($row->jenis as $tow)
                                                                    <li><a tabindex="-1" href="{{url('content/'.$rows->nama_subkategori.'/'.$row->nama_kategori.'/'.$tow->nama_jenis)}}">{{$tow->nama_jenis}}</a></li>
                                                                    @endforeach
                                                                    </ul>
                                                  </li>
                                           @endforeach    
                                    </ul>
                                  </div>
                                 
                                </li>
                                 @endforeach

                                 <li class="dropdown">
                                    <a id="brand" href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">BRAND<b class="caret"></b></a>
                                    <div id="brand">
                                    <ul class="dropdown-menu">
                                    @foreach($brand as $brand)
                                        <li><a href="{{url('brand/'.$brand->nama_brand)}}">{{$brand->nama_brand}}</a>
                                        </li>
                                    @endforeach 

                                    </ul>
                                  </div>
                                </li>  
                               
                                 
                                 <li class="dropdown">
                                    <a id="review" href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">REVIEW <b class="caret"></b></a>
                                    <div id="review">
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('blog/')}}">ARTICLE</a>
                                        </li>
                                        <li><a href="{{url('video/')}}">VIDEO</a>
                                        </li>


                                    </ul>
                                  </div>
                                </li>  
                                <li>
                  
                        <div class="clearfix" id="search">
                            <form class="navbar-form" action="{{ route('search') }}"  role="search" method="POST">
                                            
                            {{ csrf_field() }}
                                <div class="input-group">
                                 <div id="blah" class="hidden">
                                    <input type="text" class="form-control" name="search" style="padding:6px 200px;" placeholder="Search">
                                    </div>
                                    <span class="input-group-btn">

                    <div  id="yes"  class="btn btn-template-main"><i class="fa fa-search"></i></div>
                    <button id="yess" class="hidden" class="btn btn-template-main"><i class="fa fa-search"></i></button>

                </span>
                                </div>
                            </form>

                        </div>
                        
                        </li>
                     <!--    <li>
                        <div class="clearfix" id="search2">
                         <form2 class="navbar-form2" role="search">
                                <div class="input-group">

                         <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>
                         </div>
                         </form2>
                         
                         </div>
                         </li> -->
                       
                       

                                                                              
                            </ul>

                        </div>
                        <!--/.nav-collapse -->



                        <!--/.nav-collapse -->

                    </div>


                </div>
                <!-- /#navbar -->

            </div>

            <!-- *** NAVBAR END *** -->

        </header>
         <!-- *** LOGIN MODAL ***
_________________________________________________________ -->

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer login</h4>
                    </div>
                    <div class="modal-body">
                       <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     
                                <p class="text-center">
                                <button type="submit" class="btn btn-template-main"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>
                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="{{ route('login') }}"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

        <!-- *** LOGIN MODAL END *** -->
        