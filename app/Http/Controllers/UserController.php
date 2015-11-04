<?php 

namespace App\Http\Controllers; 
use Validator, Input, redirect, Auth;
 
class UserController extends Controller { 
	public function postLogin(){
		$validate = Validator::make(Input::all(),array(
			'username'=>'required|min:10',
			'password'=>'required'
		));
		if ($validate->fails()){
			return redirect('/')->with('success','Wrong inputs');
		}else{
		$remember = (Input::has('remember')) ? true : false;
		$fullUsername = explode("@", Input::get('username'));
			if(sizeof($fullUsername) == 2){
				if($fullUsername[1] == "danulabs"){
						$auth = Auth::attempt(array(
							'username'=> $fullUsername[0],
							'password'=> Input::get('password')
						),$remember);
							if($auth){
								return redirect('/home');
							}else{
								return redirect('/')->with('success','Wrong inputs');
							}
				}else{
						return redirect('/')->with('success','Wrong inputs');
				}
			}else{
				return redirect('/')->with('success','Wrong inputs');
			}
		}
	}
	public function userLogout(){
		Auth::logout();
		return redirect('/');
	}
} 