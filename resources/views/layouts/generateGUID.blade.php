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
		<div id="contentHolder">
			<div class="leftHolder">
				
				<div class="menuItem" style="background-color:#f5f5f5;">GUID Generator</div>
	
				<a href="{{URL::route('guidToHex')}}" style="text-decoration:none">
					<div class="menuItem">Hex to GUID</div>
				</a>
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
	  			<li class="active">Generate guids</li>
			</ol>
				<p style="font-family:'Lobster';font-size:17px;margin-top:30px">Generate guids</p>
			<hr/>
				<div class="centerHolder" style="margin-top:-15px;width:100%;margin:auto auto">
					<p>How many GUIDs do you want:</p>
					<form method="GET" action="{{URL::route('gguid')}}"> 
						<input name="guids" class="form-control" type="text" style="width:200px;margin-top:20px" />
						<button class="btn btn-primary" type="submit" style="margin-top:20px">Generate</button>
					</form>
					@if(isset($result))
						<div class="guidContainer" style="overflow-y:scroll;max-height:180px;width:400px;background:#f5f5f5">
							@foreach($guidss as $guid)
								<p style="padding:2px 10px">{{$guid}}</p>
							@endforeach
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