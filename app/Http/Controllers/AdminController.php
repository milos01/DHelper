<?php 

namespace App\Http\Controllers; 
use Validator, Input, redirect, Auth,Hash, App\User;
use App\Http\Requests\UserRegisterRequest;

use App\Commands\CreateUserCommand;
 
class AdminController extends Controller { 
	public function addUser(){
		return view('layouts.addUser');
	}
	public function manageUsers(){
		$allUsers = User::all();
		return view('layouts.manageUsers')->with('allUsers', $allUsers);
	}
	public function createUser(UserRegisterRequest $request){
			$this->dispatch(
				new CreateUserCommand($request->input('username'), $request->input('password'))
			);
			return redirect('/add/user')->with('success','User added successfully');

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
	private function downgrade($id){
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