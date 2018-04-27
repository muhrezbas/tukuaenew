<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\video;
use App\brand;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class PublishVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $video = video::all();
        $brand = brand::all();
        return view('admin.video.video')->with('brand',$brand)->with('video',$video);
    }

  public function tambah(Request $request)
    {
        
        $video = new video; // new Model
        $video->judul_video = $request->judul_video;
        $video->link_video = $request->link_video;
        // $video->pembuat = $request->pembuat;
        $video->sourcevideo = $request->sourcevideo;
        $video->deskripsi = $request->deskripsi;
        $video->id_brand = $request->id_brand;


        $video->save();
        return redirect('videoadmin');

       //
    }
    public function showEdit($id)
    {
        // cari data yang akan diedit
       
       $video = video::find($id);
       $brand = brand::all();
        // tampilkan view beserta data yang akan diedit
        return view('admin.video.edit')->with('brand',$brand)->with('video',$video);
    }

    
        // proses update data
       public function postUpdate($id, Request $request)
    {  
      $video = video::find($id);
        $video->judul_video = $request->judul_video;
        $video->link_video = $request->link_video;
        // $video->pembuat = $request->pembuat;
         $video->sourcevideo = $request->sourcevideo;
          $video->deskripsi = $request->deskripsi;
          $video->id_brand = $request->id_brand;


        $video->save();
        // kembali ke halaman ukuran
        return redirect('videoadmin');//route
    }

}
