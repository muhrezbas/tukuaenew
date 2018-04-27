

                    <!-- *** LEFT COLUMN ***
			_________________________________________________________ -->
@extends('layout-universal.master')

@section('css')

@endsection
@section('content')
@section('active',"active")
<div class="container">

                <div class="row">
                    <div class="col-md-12" id="blog-post">


                        <p class="text-muted text-uppercase mb-small text-right">By <a href="#">{{$tampilkanblog->penulis}}</a> |{{$tampilkanblog->created_at}}</p>
                       

                        <div id="post-content">
                      

                            {!!$tampilkanblog->artikel!!}

                       

                        </div>
                        <!-- /#post-content -->



                    </div>
                    <!-- /#blog-post -->

                    <!-- *** LEFT COLUMN END *** -->

                    <!-- *** RIGHT COLUMN ***
				_________________________________________________________ -->

                   
                    <!-- /.col-md-3 -->

                    <!-- *** RIGHT COLUMN END *** -->


                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
        @endsection

        @section('js')