<?php 

namespace App\Http\Controllers; 
use Validator, Input, redirect, Auth;
use App\Http\Requests\UserLoginRequest;

class UserController extends Controller { 
	public function postLogin(UserLoginRequest $request){
		$remember = (Input::has('remember')) ? true : false;
		$fullUsername = explode("@", $request->input('username'));
			if(sizeof($fullUsername) == 2){
				if($fullUsername[1] == "danulabs"){
						$auth = Auth::attempt(array(
							'username'=> $fullUsername[0],
							'password'=> $request->input('password')
						),$remember);
							if($auth){
								return redirect('/home');
							}else{
								return redirect('/')->with('fail','Wrong inputs');
							}
				}else{
						return redirect('/')->with('fail','Wrong inputs');
				}
			}else{
				return redirect('/')->with('fail','Wrong inputs');
			}
	}
	public function userLogout(){
		Auth::logout();
		return redirect('/');
	}
} 