<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield("title")</title>
    <link href="{{url('pusat/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('pusat/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('pusat/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{url('pusat/css/price-range.css')}}" rel="stylesheet">
    <link href="{{url('pusat/css/animate.css')}}" rel="stylesheet">
    <link href="{{url('pusat/css/main.css')}}" rel="stylesheet">
    <link href="{{url('pusat/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{url('pusat/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{url('pusat/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{url('pusat/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{url('pusat/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{url('pusat/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->
<style type="text/css">
    
</style>
<body>
    <header id="header"><!--header-->
        <!-- header top-->
            @include("layout_master.headertop")

        <!-- header top-->
        
            <!--header-middle-->
             @include("layout_master.headermiddle")

            <!--/header-middle-->
    
        <!-- header bottom-->
             @include("layout_master.headerbottom")
        <!--/header bottom-->
    </header><!--/header-->
<section>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

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

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

    <footer id="footer"><!--Footer-->
        
         @include("layout_master.footer")
    </footer><!--/Footer-->
    

  
    <script src="{{url('pusat/js/jquery.js')}}"></script>
    <script src="{{url('pusat/js/price-range.js')}}"></script>
    <script src="{{url('pusat/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{url('pusat/js/bootstrap.min.js')}}"></script>
    <script src="{{url('pusat/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{url('pusat/js/main.js')}}"></script>
</body>
</html>