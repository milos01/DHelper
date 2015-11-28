@extends('layouts.master')
<title>Helper | Add User</title>
@section('head')
	@parent
@stop
@section('body')
	@if($errors)
		@foreach($errors->all() as $error)
			<div class = "alert alert-danger alertDiv" style="position:absolute;width:100%;top:0;border-radius:0px;text-align:center">{{$error}}</div>
		@endforeach
	@endif
	    
	@if(Session::has('success'))
		<div class = "alert alert-success alertDiv" style="position:absolute;width:100%;top:0;border-radius:0px;text-align:center">{{Session::get('success')}}</div>
	@endif
	<div class="holderHome">
		<h1>Hi {{Auth::user()->username}}, need help?</h1>
		@if(!Auth::user()->isAdmin)
			<p class="userType pull-right">Regular user</p>
		@else
			<p class="userType pull-right">Administrator</p>
		@endif
		<div id="contentHolder">
			<div class="leftHolder">
				<a href="{{URL::route('guidGenerator')}}" style="text-decoration:none">
					<div class="menuItem">GUID Generator</div>
				</a>
				<a href="{{URL::route('userLogout')}}" style="text-decoration:none">
					<div class="menuItem">Hex to GUID</div>
				</a>
				@if(Auth::user()->isAdmin())
					<a href="{{URL::route('manageUsers')}}" style="text-decoration:none">
						<div class="menuItemAdmin">Manage users</div>
					</a>
					<div class="menuItemAdmin" style="background:#3399FF">Add user</div>
				@endif
				<a href="{{URL::route('userLogout')}}" style="text-decoration:none">
					<div class="menuItem">Log out</div>
				</a>
			</div>
			<div class="rightHolder">
			<ol class="breadcrumb" style="margin-top:20px">
	  			<li><a href="/">Home</a></li>
	  			<li class="active">Add users</li>
			</ol>
				<p style="font-family:'Lobster';font-size:17px;margin-top:30px">Add user</p>
			<hr/>
				<div class="centerHolder pull-left">
					<form method="POST" action="{{URL::route('createUser')}}">
						<div class="cont" style="width:400px;float:left;margin-bottom:15px;">
							<input type="text" name="username" class="form-control inputs" style="width:180px;float:left;margin-top:0px" placeholder="enter username..."/><span class="danulText pull-left">@danulabs</span>
						</div>
						<input type="password" name="password" class="form-control inputs" style="width:220px;" placeholder="enter password..."/>
						<input type="password" name="addretypepassword" class="form-control inputs" style="width:220px;" placeholder="retype password..."/>
						<input type="submit"  class="btn btn-default" value="Register user" style="width:130px;margin-top:15px"/>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					</form>
				</div>
			</div>
		</div>
	</div>
@stop
@section('javascript')
	@parent
@stop