<?php 

namespace App\Http\Controllers; 
use Validator, Input, redirect, Auth,Hash, App\User;
 
class AdminController extends Controller { 
	public function addUser(){
		return view('layouts.addUser');
	}
	public function manageUsers(){
		$allUsers = User::all();
		return view('layouts.manageUsers')->with('allUsers', $allUsers);
	}
	public function createUser(){
		$validator = Validator::make(Input::all(),array(
			'username' => 'required|unique:users',
			'password' => 'required|min:6',
			'addretypepassword' => 'required|same:password'
		));
		if ($validator->fails()) {
			return redirect('/add/user')->with('fail','Wrong inputs');
		}else{
			$user = new User;
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('password'));
			$user->isAdmin  = 0;

			if ($user->save()) {
				return redirect('/add/user')->with('success','User added successfully');
			}else{
				return redirect('/add/user')->with('fail','Internal error');
			}
		}
	}
	public function makeAdmin($id){
		$user = User::find($id);
		$user->isAdmin = 1;
		$username = $user->username;
		if($user->save()){
			return redirect('/manage/users')->with('success','You made '.$username.'@danulabs admin');
		}else{
			return redirect('/manage/users')->with('fail','Internal error');
		}

	}
	public function downgrade($id){
		$user = User::find($id);
		$user->isAdmin = 0;
		$username = $user->username;
		if($user->save()){
			return redirect('/manage/users')->with('success','You downgraded '.$username.'@danulabs');
		}else{
			return redirect('/manage/users')->with('fail','Internal error');
		}
	}
} 