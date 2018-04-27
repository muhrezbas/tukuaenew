@extends('admin.admin_template')



@section('content')
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
<div class="panel panel-card" >
        <div class="row">
          <section class="content-header" style="text-align:center">
            <h2>
               Edit user
            </h2>
            <!-- You can dynamically generate breadcrumbs here -->
            </section>
            <br/>
          </div>
          
         <form method="post" action="{{ url('customer/update/'.$user->id) }}" style="margin-left:10px">
          <div class="row">
    {{ csrf_field() }}
    <div class="col-lg-12 col-md-12 col-sm-12">
  <label> Nama user</label>
    <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Nama user" required>
    <label> username</label>
    <input type="text" class="form-control" name="username" value="{{ $user->username }}" placeholder="Username" required>
     <label> email</label>
    <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email" required>
    <label>Level</label>
<div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            

                           
                                <select name ="level" class="form-control">
                @if ($user->level=="USER")              
               <option value="{{$user->level}}">{{$user->level}}     </option>
                <option value="ADMIN">ADMIN     </option>
                

                 @else
                  <option value="{{$user->level}}">{{$user->level}}     </option>
                 <option value="USER">USER </option>
               
               @endif
                


                
                                </select>

                              
                            </div>
    
<br/>
    
    





  </div>
</div>

  <div class="row">
<div class="col-lg-4 col-md-4 col-sm-4">
    <button type="submit"  class="btn btn-fw btn-info waves-effect waves-effect">Simpan</button>
  </div>
  </div>
    </form>

    </div>
  </div>

@endsection
@section('js')

   

    @endsection