<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
Use App\Post;

class PostController extends Controller
{
   

      public function __construct(Post $post)
      {
          $this->post = $post;
      }

    public function store(Request $request)
    { 
        $post = $this->post;
        $post->title = $request->title;
        $post->body = $request ->body; 
        $post->save();
    
      
      return response()->json('successfully added');
    }

    public function index()
    {
      $data = $this->post->get();
      
      return response()->json($data);
    }

    public function edit($id)
    {
      $post = Post::find($id);
      return response()->json($post);
    }

    public function update($id, Request $request)
    {
      
      $post = $this->post->where('id',$id)->first();
      
      $post->title = $request->title;
      $post->body = $request ->body; 
      $post->save();
  

      return response()->json('successfully updated');
    }

    public function delete($id)
    {
      $post = Post::find($id);

      $post->delete();

      return response()->json('successfully deleted');
    }
}
