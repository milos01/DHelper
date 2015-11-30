<?php 

namespace App\Http\Controllers; 
use Validator, Input, redirect, Auth,Hash, App\User;
use App\Http\Requests\UserRegisterRequest;

use App\Commands\CreateUserCommand;
use App\Commands\MakeAdminCommand;
 
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
		$this->dispatch(
			new MakeAdminCommand($id)
		);

		return redirect('/manage/users')->with('success','You made new admin');


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