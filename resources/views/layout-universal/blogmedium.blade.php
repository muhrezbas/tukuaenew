@extends('layout-universal.master')

@section('css')

@endsection
@section('content')
@section('active',"active")
<div id="content">
            <div class="container">
                <div class="row">
                    <!-- *** LEFT COLUMN ***
			 _________________________________________________________ -->

                    <div class="col-md-12" id="blog-listing-medium">
                     @foreach ($blog as $blog) 
                    <section class="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="image">
                                        <a href="{{url('blog/'.$blog->id_blog)}}">
                                           <img src="https://drive.google.com/uc?export=view&id={{substr($blog->thumbnail,33)}}" class="img-responsive" alt="Example blog post alt">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <h2><a href="{{url('blog/'.$blog->id_blog)}}">{{$blog->judul_blog}}</a></h2>
                                    <div class="clearfix">
                                        <p class="author-category">By <a href="#">{{$blog->penulis}}</a> for <a href="blog.html">{{ $blog->brand->nama_brand }}</a>
                                        </p>
                                        <p class="date-comments">
                                            <a href="{{url('blog/'.$blog->id_blog)}}"><i class="fa fa-calendar-o"></i> {{$blog->created_at}}</a>
                                          <!--   <a href="{{url('blog/'.$blog->id_blog)}}"><i class="fa fa-comment-o"></i> 8 Comments</a> -->
                                        </p>
                                    </div>
                                   {!! $blog->deskripsi_artikel !!}
                                    <p class="read-more"><a href="{{url('blog/'.$blog->id_blog)}}" class="btn btn-template-main">Continue reading</a>
                                    </p>
                                </div>
                            </div>
                        </section>
                         @endforeach

                        <ul class="pager">
                            <li class="previous"><a href="#">&larr; Older</a>
                            </li>
                            <li class="next disabled"><a href="#">Newer &rarr;</a>
                            </li>
                        </ul>



                    </div>
                    <!-- /.col-md-9 -->

                    <!-- *** LEFT COLUMN END *** -->

                    <!-- *** RIGHT COLUMN ***
			 _________________________________________________________ -->

                 

                    <!-- *** RIGHT COLUMN END *** -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** GET IT ***
_________________________________________________________ -->



        <!-- *** GET IT END *** -->
        @endsection

            @section('js')
