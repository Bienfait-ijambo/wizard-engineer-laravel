<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Validator;
use DB;
class AuthController extends Controller
{
    
    private $secretKey="qQKPjndxljuYQi/POiXJa8O19nVO/vTf/DpXO541g=qQKPjndxljuYQi/POiXJa8O19nVO/vTf/DpXO541g=";

    public function register(Request $request){

    	$fields=$request->all();

    	$errors=Validator::make($fields,[
    		'name'=>'required|string',
    		'email'=>'required|string|email|unique:users,email',
    		'password'=>'required',
    	]);

    	if ($errors->fails()) {
    		return response($errors->errors()->all(),422);
    	}

    	$user=User::create([
    		'name'=>$fields['name'],
    		'email'=>$fields['email'],
    		'password'=>bcrypt($fields['password']),
    	]);

    	return response([
    		'user'=>$user,
    		'message'=>'your account was created !'
    	],200);

    }


    public function login(Request $request)
    {
    	$fields=$request->all();

    	$errors=Validator::make($fields,[
    		'email'=>'required|string|email',
    		'password'=>'required',
    	]);

    	if ($errors->fails()) {
    		return response($errors->errors()->all(),422);
    	}

    	$user=User::where('email',$fields['email'])->first();

        if (!$user || !Hash::check($fields['password'],$user->password)) {
           
           return response(['message'=>'email or password invalid'],401);
        }

        $token=$user->createToken($this->secretKey)->plainTextToken;

        return response([
            'user'=>$user,
            'token'=>$token
        ],201);
 
    }


    public function logoutUser(Request $request)
    {
        DB::table('personal_access_tokens')
        ->where('tokenable_id',$request->userId)
        ->delete();

        return response(['message'=>'user logged out !'],200);
    }


    public function userIsLoggedIn(Request $request)
    {
        return response(['message'=>''],200);
    }


    
}
