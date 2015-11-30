<?php 

namespace App\Http\Controllers; 
use Validator, Input, redirect, Auth;
use App\Http\Requests\UserLoginRequest;

class UserController extends Controller { 
	public function postLogin(UserLoginRequest $request){
		$remember = ($request->input('remember')) ? true : false;
		$user = $this->userExplode($request->input('username'));
		if($user != false){
			$auth = Auth::attempt(array(
				'username'=> $user,
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
	}

	private function userExplode($username){
		$fullUsername = explode("@", $username);
		if(sizeof($fullUsername) == 2){
			if($fullUsername[1] == "danulabs.com"){
				return $fullUsername[0];
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function userLogout(){
		Auth::logout();
		return redirect('/');
	}
} 