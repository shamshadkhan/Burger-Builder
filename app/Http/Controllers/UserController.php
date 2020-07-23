<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;

class UserController extends Controller
{
    
	/**
     * Register a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        try{
        	if(!User::where('email', $request->get('email'))->exists()){
        		$user = new User([
	                'email' => $request->get('email'),
	                'name'=> $request->get('name'),
	                'password'=> Hash::make($request->get('password')),
            	]);
	           $user->save();
	           $user = DB::table('users')->orderBy('id','asce')->first();
	           return response()->json($user, 200);
        	}
        	 return response()->json(array(
	           'message' => 'User email already Exists.',
	        ), 400);
            
        }
        catch(\Exception $e){
        	var_dump($e->getMessage());
            report($e);
            return false;
        }
    }

    /**
     * Login a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request) {
        if(User::where('email', $request->get('email'))->exists()){
           $user = User::where('email', $request->get('email'))->first();
           $auth = Hash::check($request->get('password'), $user->password);
           if($user && $auth){
              $token = Str::random(60);
              $api_token = Hash('sha256', $token);
              $user->api_token = $api_token;
              $user->save();
              return response()->json(array(
                 'data' => $user,
                 'expireIn' => 3600,
                 'message' => 'Authorization Successful!',
              ),200);
           }
        }
        return response()->json(array(
           'message' => 'Unauthorized, check your credentials.',
        ), 401);
        
    }
}
