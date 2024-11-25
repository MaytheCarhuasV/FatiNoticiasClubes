<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::orderBy('id','DESC')->get();
        return view('post', compact('post'));
    }
    public function home()
    {
        $post_ambiente = Post::orderBy('id','DESC')->where('category','=','ambiente')->get();
        $post_servicio_publico= Post::orderBy('id','DESC')->where('category','=','servicio_publico')->get();
        $post_organizaciones= Post::orderBy('id','DESC')->where('category','=','organizaciones')->get();
        $post_voluntariado= Post::orderBy('id','DESC')->where('category','=','voluntariado')->get();
        $post_club= Post::orderBy('id','DESC')->where('category','=','club')->get();
        return view('galaxy_home', compact('post_ambiente','post_servicio_publico','post_organizaciones','post_voluntariado','post_club'));
      
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = New Post();
        $post->title= $request->title;
        $post->description= $request->description;
        $post->post= $request->post;
        $post->category= $request->category;
        $post->url_invitation= $request->url_invitation;

        if ($request->file('photo') != null) {
            $request->photo = photoStore($request->file('photo'), "imageusers");
            $post->photo = $request->photo;
        }

       
        $post->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }
    public function  category(Request $request)
    {
        $posts= Post::orderBy('id','DESC')->where('category','=',$request->category)->get();
        $category=$request->category;
        return view('galaxy_category', compact('posts','category'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $post= Post::find($request->id);
      return  $post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $post= Post::find($request->id);
        $post->title= $request->title;
        $post->description= $request->description;
        $post->post= $request->post;
        $post->category= $request->category;
        $post->url_invitation= $request->url_invitation;

   
  

        if ($request->file('photo') != null) {
           // $table = Post::find($request["id"]);
            photoDestroy($post->photo, "imageusers");
            $request->photo = photoStore($request->file('photo'), "imageusers");
            $post->photo = $request->photo;
        }

       
        $post->save();
    }
    public function report(Request $request)
    {
        
        $post= Post::find($request->id);
        return view('post_view',compact('post'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $table = Post::find($request["id"]);
        photoDestroy($table->photo, "imageusers");
        $post= Post::find($request->id);
        $post->delete();
       
    }
}
