@extends('layouts.master')
@section('head')
	<title>Helper|Home</title>
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
				@if(Auth::user()->isAdmin())
					<div class="menuItemAdmin">Mange users</div>
				@endif
				<a href="{{URL::route('userLogout')}}" style="text-decoration:none">
					<div class="menuItem">Log out</div>
				</a>
			</div>
		</div>
	</div>
@stop
@section('javascript')
	@parent
@stop