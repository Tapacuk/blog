<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    public function redirectToProvider_facebook()
    {
    		return Socialite::driver('facebook')->redirect();
    }
    
    public function handleProviderCallback_facebook()
    {
    		$socialUser = Socialite::driver('facebook')->user();
    		
    		$data = [
    				'facebook_id' => $socialUser->getId(),
    				'name' => $socialUser->name,
    				'email' => $socialUser->getEmail(),
    				'avatar' => $socialUser->getAvatar()
    		];
    
    $user = User::where('facebook_id', $data['facebook_id'])->first();
    
    if(is_null($user)) {
    
    		$user = User::where('email', $data['email'])->whereNotNull('email')->first();
    		
    		if(!is_null($user)) { 
    				$user->facebook_id = $data['facebook_id'];
    				$user->update();
    		}	else {
    		
		    		$user = new User($data);
		    		$user->save();
    				
    				$avatar = $socialUser->getAvatar();
    				$filename = time() . '.' . 'jpg';
    				Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename) );
    				
    				$user->avatar = $filename;
    				$user->update();
    		}
    }
    
    Auth::login($user, true);

    return redirect($this->redirectPath()); 
    }
}
