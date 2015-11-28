@extends('layouts.master')
<title>Helper | Home</title>
@section('head')
	@parent
@stop
@section('body')
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
				@if(Auth::user()->isAdmin())
					<a href="{{URL::route('manageUsers')}}" style="text-decoration:none">
						<div class="menuItemAdmin">Mange users</div>
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
				<p id="selectOption">Select option from the left menu</p>
			</div>
		</div>
	</div>
@stop
@section('javascript')
	@parent
@stop