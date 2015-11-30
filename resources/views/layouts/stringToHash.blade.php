@extends('layouts.master')
<title>Helper | String to hash</title>
@section('head')
	@parent
@stop
@section('body')
	@if($errors)
		@foreach($errors->all() as $error)
			<div class = "alert alert-danger alertDiv" style="position:absolute;width:100%;top:0;border-radius:0px;text-align:center">{{$error}}</div>
		@endforeach
	@endif
	@if(Session::has('fail'))
	    <div class = "alert alert-danger alertDiv" style="position:absolute;width:100%;top:0;border-radius:0px;text-align:center">{{Session::get('fail')}}</div>
	@elseif(Session::has('success'))
		<div class = "alert alert-success alertDiv" style="position:absolute;width:100%;top:0;border-radius:0px;text-align:center">{{Session::get('success')}}</div>
	@endif
	<div class="holderHome">
		<h1>Hi {{Auth::user()->username}}, need help?</h1>
		@if(!Auth::user()->isAdmin)
			<p class="userType pull-right">Regular user</p>
		@else
			<p class="userType pull-right">Administrator</p>
		@endif
		<div id="contentHolder" style="height:650px">
			<div class="leftHolder">
				<a href="{{URL::route('guidGenerator')}}" style="text-decoration:none;">
					<div class="menuItem">GUID Generator</div>
				</a>
				<a href="{{URL::route('guidToHex')}}" style="text-decoration:none">
					<div class="menuItem">Hex to GUID</div>
				</a>
				<div class="menuItem" style="background-color:#f5f5f5;">String to hash</div>
				<a href="{{URL::route('guidGenerator')}}" style="text-decoration:none">
					<div class="menuItem">Base64</div>
				</a>
				@if(Auth::user()->isAdmin())
					<a href="{{URL::route('manageUsers')}}" style="text-decoration:none">
						<div class="menuItemAdmin" >Mange users</div>
					</a>
					<a href="{{URL::route('addUser')}}" style="text-decoration:none">
						<div class="menuItemAdmin">Add user</div>
					</a>
				@endif
				<a href="{{URL::route('userLogout')}}" style="text-decoration:none">
					<div class="menuItem">Log out</div>
				</a>
			</div>
			<div class="rightHolder">
			<ol class="breadcrumb" style="margin-top:20px">
	  			<li><a href="/">Home</a></li>
	  			<li class="active">String to hash</li>
			</ol>
				<p style="font-family:'Lobster';font-size:17px;margin-top:30px">String to hash</p>
			<hr/>
				<div class="centerHolder" style="margin-top:-15px;width:100%;margin:auto auto">
					<p>Enter string:</p>
					<form method="GET" action="{{URL::route('hss')}}"> 
						<textarea rows="7" name="string" class="form-control" type="text" style="width:300px;margin-top:20px"></textarea>
						<button class="btn btn-primary" type="submit" style="margin-top:10px">Hash string</button>
					</form>
					@if(isset($md5))
						<h2>Result</h2>
						<hr/>
						<div class="guidContainer" style="">
							<p>md5 hash:</p>
							<input type="text" value="{{$md5}}" class="form-control" style="width:300px" />
							<p style="margin-top:10px">sha1 hash:</p>
							<input type="text" value="{{$sha1}}" class="form-control" style="width:300px"/>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
@stop
@section('javascript')
	@parent
@stop