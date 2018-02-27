<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Support\Str;
use Image;
use Search;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostFormRequest;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
    		$posts = Post::latest('updated_at')->get();
    		$articles = Post::latest('updated_at')->where('status', '=', '1')->paginate(5);
    		return view('blog.index', compact('posts', 'articles'));
    }
    
    public function show($slug)
    {
      $post = Post::whereSlug($slug)->firstOrFail();
      if($post->status)
      {
		      $comments = $post->comments()->get();
		      //dd($comments->pluck('user_name'));
		      //if(!is_null($comments)) 
		      !$comments ? $user = User::whereName($comments->pluck('user_name'))->firstOrFail() : 
		      $user = Auth::user();
			
		      //dd($comments);
		      return view('blog.show', compact('post', 'comments', 'user'));
    		}	else {
    		return  /*abort(404);*/redirect('/blog')->withErrors('The post has not been created yet.');
    		}
    }
    
    public function create()
    {
    		$categories = Category::all();
    		return view('blog.create', compact('categories'));
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
		    				'status' => 0,
		    				'user_id' => Auth::id(),
		    		));
		    		
		    		$post->save();
		    		$post->categories()->sync($request->get('categories'));
    		} else return redirect('/bloggers/create')->withErrors('Avatar should be added!');	
    		
    		return redirect('/bloggers/create')->with('status', 'The post has been created!');		
    }
    
    public function search(Request $request)
    {
    		//dd($request->search);
    		$search = Search::search(
		      "Post" ,
		      ['title' , 'content'] ,
		      $request->search ,
		      ['id','title', 'content','status','slug','created_at'],
		      ['id'  , 'asc'] ,
		      true ,
		      30
						);
						//dd($search->pluck('id'));
						//dd($search);
						if(!empty($request->search)) {
								if(!$search->isEmpty()){
								 	$posts = Post::latest('updated_at')->whereId($search->pluck('id'))->get();
								 	!$search->isEmpty() ? $result = 1 : $result = 0;
						return view('blog.search', compact('posts', 'result'));
								} else 	return redirect('/blog')->withErrors('Article has not been found');
						}	else	return redirect('/blog')->withErrors('Fill the string');
						//dd($posts);
    }
}
