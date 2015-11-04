<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Danulabs helper</title>
    @section('head')
      <link href='https://fonts.googleapis.com/css?family=Didact+Gothic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="{{ URL::asset('../css/style.css') }}"/>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">  
    <style type="text/css">
      body{
        /*font-family: 'Didact Gothic', sans-serif;*/
      }
    </style>
    @show
  </head>
  
<body>
@section('body')
  @if(Session::has('success'))
    <div class = "alert alert-danger alertDiv" style="position:absolute;width:100%;top:0;border-radius:0px;text-align:center">{{Session::get('success')}}</div>
  @endif
  <div class="holder">
    <h1 id="header">Danulabs helper</h1>
    <form method="POST" action= "{{URL::route('postLogin')}}">
      <div class="inputHolder">
        <input name="username" class="form-control inputs" type="text" placeholder="Enter username..."/>
        <input name="password" class="form-control inputs" type="password" placeholder="Enter password..."/>
        <input class="btn btn-primary inputs" type="submit" value="Log In" style="width:120px;margin-left:130px" />
        <span class = "check/box pull-left" style="margin-top:-30px">
            <label for = "remember">
              <input type ="checkbox"  id="remember" name="remember">
              Keep me in
            </label>
        </span>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </div>
    </form>
    @if(Auth::check())
      {{Auth::user()->username}}
    @endif
  </div>
@show
@section('javascript')
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
@show
</body>
</html>
