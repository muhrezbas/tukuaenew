@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                
                @if(Auth::user()->level == 'ADMIN')
                    <div class="panel-body">
                         Halaman Admin!
                    </div>
                @else
                    <div class="panel-body">
                         Halaman User!
                </div>
                @endif
                <div class="panel-body">
                Hello {{ Auth::user()->name }} <br/>
                Email anda : {{ Auth::user()->email }} <br/>
                Anda login menggunakan username : {{Auth::user()->username }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
