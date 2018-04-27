@extends('templates.index')
@section('content')

@if(count($blogs))
	<ul>
		@foreach($blogs as $blog)
			<li>Judul : {{ $blog->judul }}</li>
		@endforeach
	</ul>
	@else
	<p>Post tidak ada.</p>
@endif


@stop

