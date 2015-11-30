@extends('layouts.master')
<title>Helper | Manage users</title>
@section('head')
	@parent
@stop
@section('body')
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
				<a href="{{URL::route('guidGenerator')}}" style="text-decoration:none">
					<div class="menuItem">GUID Generator</div>
				</a>
				<a href="{{URL::route('guidToHex')}}" style="text-decoration:none">
					<div class="menuItem">Hex to GUID</div>
				</a>
				<a href="{{URL::route('stringToHash')}}" style="text-decoration:none">
					<div class="menuItem">String to hash</div>
				</a>
				<a href="{{URL::route('guidGenerator')}}" style="text-decoration:none">
					<div class="menuItem">Base64</div>
				</a>
				@if(Auth::user()->isAdmin())
					<div class="menuItemAdmin" style="background:#3399FF">Mange users</div>
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
	  			<li class="active">Manage users</li>
			</ol>
				<p style="font-family:'Lobster';font-size:17px;margin-top:30px">Manage users</p>
			<hr/>
				<div class="centerHolder" style="margin-top:-15px;width:100%;margin:auto auto">
					<?php
						$i = 0;
					?>
					@foreach($allUsers as $user)
						@if($user->id != Auth::user()->id)
							@if($i % 2 == 0)
								<div class="userItem" style="background:white;">
							@else
								<div class="userItem" style="background:#F2F2F2;">
							@endif
								<p style="padding:24px 15px;">{{$user->username."@danulabs"}}</p>
								@if($user->isAdmin == 0)
									<a href="{{URL::route('makeAdmin',$user->id)}}">
										<span class="pull-right" style="margin-top:-54px;margin-right:15px;color:#111">Make admin</span>
									</a>
								@else
									<span class="pull-right" style="margin-top:-54px;margin-right:15px;color:#111">Admin <span style="color:#111">|</span>
										<a href="{{URL::route('downgrade',$user->id)}}" style="text-decoration:none">
										 	<span style="color:red">Downgrade</span>
										</a>
									 </span>

								@endif
							</div>
							<?php $i++; ?>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
@stop
@section('javascript')
	@parent
@stop