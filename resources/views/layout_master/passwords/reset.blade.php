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
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
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

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
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