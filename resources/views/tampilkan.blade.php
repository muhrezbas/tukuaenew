@extends('templates.index')
@section('content')

<h4>Lihat Data</h4>
ID nya : {{$tampilkan->id}}, <br/>
Judul nya : {{$tampilkan->judul}}, <br/>
Dibuat : {{$tampilkan->created_at}}, <br/>
Diedit : {{$tampilkan->updated_at}}

@stop