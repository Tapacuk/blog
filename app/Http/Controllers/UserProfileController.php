<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\PostEditFormRequest;
use App\Comment;
use App\Category;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class UserProfileController extends Controller
{
    public function index($id)
    {
    		$user = User::whereId($id)->firstOrFail();
    		$comments = DB::table('comments')->where('user_name', $user->name)->count();
    		$posts = Post::where('user_id', '=', $user->id)->get();
    		return view('users.index', compact('user','comments', 'posts'));
    }
    
    public function update_avatar(Request $request)
    {
    		if($request->hasFile('avatar')){
    				$avatar = $request->file('avatar');
    				$filename = time() . '.' . $avatar->getClientOriginalExtension();
    				Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename) );
    				
    				$user = Auth::user();
    				$user->avatar = $filename;
    				$user->save();
    		}
    		
    		return redirect('home');
    }
    
    public function posts($id)
    {
    		$user = User::whereId($id)->firstOrFail();
    		$posts = Post::latest('updated_at')->where('user_id', '=', $user->id)->get();
    		return view('users.posts', compact('user', 'posts'));
    }
    
    public function edit($id)
    {
    		$post = Post::whereId($id)->firstOrFail();
						//dd($post);
    		$user = User::whereId($post->user_id)->firstOrFail();
    		//dd($user);
    		if(Auth::id() == $user->id)
    		{
    		$categories = Category::all();
    		$selectedCategories = $post->categories->pluck('id')->toArray();
    		
    		return view('users.post_edit', compact('post', 'categories', 'selectedCategories'));		
    		}
    		else return redirect(action('BlogController@index'))->withErrors('You have not got such permissions!');		
    }
    
    public function update($id, PostEditFormRequest $request)
    {
    		If(Post::where('user_id', '=' , Auth::id()))
    		{   		
		    		$post = Post::whereId($id)->firstOrFail();
		    		$user = User::whereId($post->user_id)->firstOrFail(); 
		    		$post->title = $request->get('title');
		    		$post->content = $request->get('content');
		    		if($request->hasFile('avatar')){
		    				$avatar = $request->file('avatar');
				    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
				    		Image::make($avatar)->save( public_path('/uploads/avatars_blog/' . $filename) );
				    			$post->avatar = $filename;
		    		}
		    		
		    		$post->slug = Str::slug($request->get('title'), '-');
		    		
		    		$post->save();
								$post->categories()->sync($request->get('categories'));
								
								return redirect(action('UserProfileController@posts', $user->id))->with('status', 'The post has been updated!');
						}
						else return redirect(action('BlogController@index'))->withErrors('You have not got such permissions!');			
    }
    
    public function changePass($id)
    {
    		if(Auth::id() == $id)
    		{
    				$user = User::whereId($id)->firstOrFail();
    				return view('users.changePass', compact('user'));
    		}
    		
    		return redirect('home')->withErrors('You dont have such permissions');
    }
    
    public function storePass($id, Request $request)
    {
    		if(Auth::id() == $id)
    		{
    				$user = User::whereId($id)->firstOrFail();
    				
    				if(!is_null($user->password))
		    				if(!Hash::check($request->get('cur_password'), $user->password))
		    						return redirect('/profile/' . $id . '/pass')->withErrors('Current password doesnt match!');
		    				if($request->get('password') != $request->get('password_confirm'))
		    						return redirect('/profile/' . $id . '/pass')->withErrors('Repeated password and password doesnt match!');		
    						
    				$user->password = bcrypt($request->get('password'));
    				
    				$user->update();		
    				
    				return redirect('/profile/' . $id . '')->with('status', 'Password is changed!');
    		}
    		
    		return redirect('home')->withErrors('You dont have such permissions');
    }
}
