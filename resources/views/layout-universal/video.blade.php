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
                  
                      @foreach ($video as $video) 
                        <section class="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="video">
                                        <div class="embed-responsive embed-responsive-4by3">
                                            <iframe class="embed-responsive-item" src="{{$video->link_video}}"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h2><a href="post.htmls">{{$video->judul_video}}</a></h2>
                                    <div class="clearfix">
                                        <p class="author-category">By <a href="#">{{$video->pembuat}}</a> in <a src="{{$video->link_video}}"> {{$video->sourcevideo}}</a>
                                        </p>
                                        <p class="date-comments">
                                            <a><i class="fa fa-calendar-o"></i> {{$video->created_at}}</a>
                                            <!-- <a href="blog-post.html"><i class="fa fa-comment-o"></i> 8 Comments</a> -->
                                        </p>
                                    </div>
                                    {!!$video->deskripsi!!}
                                    <p class="read-more"><a href="{{$video->link_video}}" class="btn btn-template-main">Continue to watch video</a>
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



        <!-- *** GET IT END *** -->
        @endsection

            @section('js')
