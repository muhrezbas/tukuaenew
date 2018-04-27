 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TUKUAE</title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,700,800' rel='stylesheet' type='text/css'>

    <!-- Bootstrap and Font Awesome css -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

    <!-- Css animations  -->
    <link href="{{url('universal/css/animate.css')}}" rel="stylesheet">

    <!-- Theme stylesheet, if possible do not edit this stylesheet -->
    <link href="{{url('universal/css/style.default.css')}}" rel="stylesheet" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes -->
    <link href="{{url('universal/css/custom.css')}}" rel="stylesheet">
    @yield('css')

    <!-- Responsivity for older IE -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="{{url('universal/img/tukuaesmall.jpg')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{url('universal/img/apple-touch-icon-57x57.png')}}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{url('universal/img/apple-touch-icon-72x72.png')}}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('universal/img/apple-touch-icon-76x76.png')}}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{url('universal/img/apple-touch-icon-114x114.png')}}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{url('universal/img/apple-touch-icon-120x120.png')}}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{url('universal/img/apple-touch-icon-144x144.png')}}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{url('universal/img/apple-touch-icon-152x152.png')}}" />

<style>
.dropdown-submenu {
    position: relative;
}

.star {
    font-size: x-large;
    width: 24px;
    display: inline-block;
    color: gray;
}
.star:last-child {
    margin-right: 0;
}
.star:before {
    content:'\2605';
}
.star.on {
    color: gold;
}
.star.half:after {
    content:'\2605';
    color: gold;
    position: absolute;
    margin-left: -20px;
    width: 10px;
    overflow: hidden;
}
.dropdown-submenu .dropdown-menu {
    top: 0;
    right: 100%;
    margin-top: -1px;
}
/*.hidden { display: none; }*/



</style>

</head>
<body>
 @include('.layout-universal.header')
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- <section class="content-header">
            <h1>
                {{ $page_title or "Page Title" }}
                <small>{{ $page_description or null }}</small>
            </h1>
            <!-- You can dynamically generate breadcrumbs here -->
            
       <!-- </section>-->

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            
            <!--  -->
         @include('layout-universal.headerbawah')

            @yield('content')

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->


        <!-- *** GET IT END *** -->

  @include('.layout-universal.footer')
 <!-- #### JAVASCRIPT FILES ### -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
    </script>
                       <script>

$(document).ready(function(){
    if(window.matchMedia('(max-width: 768px)').matches){
        $('#blah').removeClass('hidden');
          $('#yess').removeClass('hidden');
            $('#yess').addClass('btn btn-template-main');
            $("#yes").hide();
    }
  
    $("#yes").click(function(){
 
         $('#blah').toggle();
          
         $("#women1").toggle();
         $("#women2").toggle();
         $("#women3").toggle();
         $("#women4").toggle();
          $("#women5").toggle();
           $("#women6").toggle();
         $("#brand").toggle();
         $("#review").toggle();
        $('#blah').removeClass('hidden');
      
        
    });
   

});
$('#clear').click(function(){
    $('.check').prop('checked', false);
})

$('#cart').click(function(){
    if ('{{count($belumbayar)}}'!=0){
        alert('Complete your payment first')
    }
    else {
        window.location="{{url('cart')}}";
    }
})

$('#filterbrand').on('submit',function(e){
    var min=false;
    $("#filterbrand").find(".filterbrand").each(function(){
        if($(this).prop('checked')==true){
            min=true;
        }
    });
    if(min==false){
    alert('please choose at least 1 brand');
    return false;
    }else{
        return true;
    }
})


</script>

    <script src="{{url('universal/js/jquery.cookie.js')}}"></script>
    <script src="{{url('universal/js/waypoints.min.js')}}"></script>
    <script src="{{url('universal/js/jquery.counterup.min.js')}}"></script>
    <script src="{{url('universal/js/jquery.parallax-1.1.3.js')}}"></script>
    <script src="{{url('universal/js/front.js')}}"></script>
   
      <script src="{{url('universal/js/bootstrap.min.js')}}"></script>
      <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
   
</script>

    @yield('js')

</body>
</html>