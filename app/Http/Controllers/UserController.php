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
		$auth = Auth::attempt(array(
			'username'=> Input::get('username'),
			'password'=> Input::get('password')
		),$remember);
			if($auth){
				return "Fala kiti";
			}else{
				return "Doslo je do greske!";
			}
		}
	}
} 