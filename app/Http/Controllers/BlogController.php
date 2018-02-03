<?php

namespace App\Http\Controllers;

use App\Post;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
    		$posts = Post::all();
    		return view('blog.index', compact('posts'));
    }
    public function show($slug)
    {
      $post = Post::whereSlug($slug)->firstOrFail();
      $comments = $post->comments()->get();
      return view('blog.show', compact('post', 'comments'));
    }
}
