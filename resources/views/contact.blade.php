@extends('templates.index')

@section('content')
Kontak saya :

	@if(count($contacts))
	<ul>
		@foreach($contacts as $contact)
			<li>{{ $contact }}</li>
		@endforeach
	</ul>
	@else
	        <p>Contact tidak ditemukan</p>
	@endif
@stop