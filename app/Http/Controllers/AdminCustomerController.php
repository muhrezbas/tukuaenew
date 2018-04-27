<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Session;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class AdminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user::all();
      

        return view('admin.user.user')->with('user',$user);
    }


    public function showEdit($id)
    {
        // cari data yang akan diedit
        $user = user::find($id);
        return view('admin.user.edit')->with('user',$user);
    }

    
        // proses update data
       public function postUpdate($id, Request $request)
    {  
   
      $jumlah= user::where("level","ADMIN")->count();
      if ($jumlah==1&&$request->level=="USER"){
      Session::flash('message', 'Tidak bisa, karena admin hanya tinggal satu'); 
      Session::flash('alert-class', 'alert-danger'); 
      return back();
      }

        $user = user::find($id);
      
      $user->name = $request->name;
      $user->username = $request->username;
      $user->email = $request->email;
      if($user->level=="ADMIN" && $user->id!= \auth::user()->id){
        Session::flash('message', 'Tidak bisa, karena admin tidak bisa menghapus admin lain'); 
      Session::flash('alert-class', 'alert-danger');
        return back();
      }
      $user->level = $request->level;
      $user->save();
       
        // kembali ke halaman ukuran
        return redirect('customer');//route
    }

}
