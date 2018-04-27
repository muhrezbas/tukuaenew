<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\brand;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class PublishBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $blog = Blog::all();
        $brand = brand::all();

        return view('admin.blog.blog')->with('brand',$brand)->with('blog',$blog);
    }

  public function tambah(Request $request)
    {
        
        $blog = new Blog; // new Model
        $blog->judul_blog = $request->judul_blog;
        // $blog->buatsiapa = $request->buatsiapa;
        $blog->artikel = $request->artikel;
        $blog->penulis = $request->penulis;
        $blog->deskripsi_artikel = $request->deskripsi_artikel;
        $blog->thumbnail = $request->thumbnail;
        $blog->id_brand = $request->id_brand;


        $blog->save();
        return redirect('blogadmin');

       //
    }
    public function showEdit($id)
    {
        // cari data yang akan diedit
       
       $blog = Blog::find($id);
       $brand = brand::all();
        // tampilkan view beserta data yang akan diedit
        return view('admin.blog.edit')->with('brand',$brand)->with('blog',$blog);
    }

    
        // proses update data
       public function postUpdate($id, Request $request)
    {  
      $blog = Blog::find($id);
        $blog->judul_blog = $request->judul_blog;
        // $blog->buatsiapa = $request->buatsiapa;
        $blog->artikel = $request->artikel;
        $blog->penulis = $request->penulis;
        $blog->deskripsi_artikel = $request->deskripsi_artikel;
        $blog->thumbnail = $request->thumbnail;
        $blog->id_brand = $request->id_brand;


        $blog->save();
        // kembali ke halaman ukuran
        return redirect('blogadmin');//route
    }

}
