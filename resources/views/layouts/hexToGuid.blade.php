@extends('layouts.master')
<title>Helper | Generate GUID</title>
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
		<div id="contentHolder" style="height:700px">
			<div class="leftHolder">
				<a href="{{URL::route('guidGenerator')}}" style="text-decoration:none">
					<div class="menuItem" style="background-color:#fff">GUID Generator</div>
				</a>
				
				<div class="menuItem" style="background-color:#f5f5f5;">Hex to GUID</div>
		
				@if(Auth::user()->isAdmin())
					<div class="menuItemAdmin" >Mange users</div>
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
	  			<li class="active">GUID to hex</li>
			</ol>
				<p style="font-family:'Lobster';font-size:17px;margin-top:30px">Guid to hex</p>
			<hr/>
				<form method="GET" action="{{URL::route('gth')}}">
					<input name="guidtohex" class="form-control" type="text" style="width:370px;margin-top:20px" />
					<p style="margin-top:10px"> 
						Valid Guids:<br/>
						{xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx}<br/>
						xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx<br/>
						xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx<br/>
					</p>
					<button type="submit" class="btn btn-primary" style="width:100px">Convert</button>
				</form>
				@if(isset($var))
					<h2>Result</h2>
					<hr/>
					<p class="labelA">Guid to hex</p>
					<input class="form-control" style="width:350px" type="text" value="{{$var}}"/>
					<p class="labelA">SQL syntax</p>
					<input class="form-control" style="width:350px" type="text" value="x'{{$var}}'"/>
					<p class="labelA">Cast as binary</p>
					<input class="form-control" style="width:435px" type="text" value="cast({{$var}} as binary)"/>
				@endif
			</div>
		</div>
	</div>
@stop
@section('javascript')
	@parent
@stop