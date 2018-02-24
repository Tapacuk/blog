<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use Illuminate\Support\Str;
use App\Http\Requests\PostFormRequest;
use App\Http\Requests\PostEditFormRequest;
use Image;
use Illuminate\Support\Facades\Auth;



class PostsController extends Controller
{
    public function create()
    {
    		$categories = Category::all();
    		return view('backend.posts.create', compact('categories'));
    }
    public function store(PostFormRequest $request)
    {
    		if($request->hasFile('avatar')){
		    		$avatar = $request->file('avatar');
		    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
		    				Image::make($avatar)->save( public_path('/uploads/avatars_blog/' . $filename) );
		    	 
		    	 $post = new Post(array(
		    				'title' => $request->get('title'),
		    				'content' => $request->get('content'),
		    				'slug' => Str::slug($request->get('title'), '-'),
		    				'avatar' => $filename,
		    				'user_id' => Auth::id(),
		    		));
		    		
		    		$post->save();
		    		$post->categories()->sync($request->get('categories'));
    		} else return redirect('/admin/posts/create')->withErrors('Avatar should be added!');	
    		
    		return redirect('/admin/posts/create')->with('status', 'The post has been created!');		
    }
    public function index()
    {
    		$posts = Post::all();
    		return view('backend.posts.index', compact('posts'));
    }
    public function edit($id)
    {
    		$post = Post::whereId($id)->firstOrFail();
    		$categories = Category::all();
    		$selectedCategories = $post->categories->pluck('id')->toArray();
    		
    		return view('backend.posts.edit', compact('post', 'categories', 'selectedCategories'));
    }
    public function update($id, PostEditFormRequest $request)
    {
    		$post = Post::whereId($id)->firstOrFail();
    		$post->title = $request->get('title');
    		$post->content = $request->get('content');
    		$request->has('status_post') ? $post->status = 1 : $post->status = 0;
    		if($request->hasFile('avatar')){
    				$avatar = $request->file('avatar');
		    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
		    		Image::make($avatar)->save( public_path('/uploads/avatars_blog/' . $filename) );
		    			$post->avatar = $filename;
    		}
    		
    		$post->slug = Str::slug($request->get('title'), '-');
    		
    		$post->save();
						$post->categories()->sync($request->get('categories'));
						
						return redirect(action('Admin\PostsController@edit', $post->id))->with('status', 'The post had been updated!');
    }
}
