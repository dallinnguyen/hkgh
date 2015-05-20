@extends('layout.base')

@section('browser')
	
@stop

@section('head')
	{{ HTML::style('css/login.css') }}
	
	
		
		<!--[if lte IE 7]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
		<style>
			@import url(http://fonts.googleapis.com/css?family=Ubuntu:400,700);
			
			.container > header h1,
			.container > header h2 {
				color: #fff;
				text-shadow: 0 1px 1px rgba(0,0,0,0.7);
			}
		</style>
@stop

@section('content')
	<p>
		{{ $errors->first('email') }}
		{{ $errors->first('password') }}
	</p>
	<div class="container">
		
			
            
			
			
			
			<section class="main">
				<form class="form-3" method="post" action="{{URL::to('auth/login')}}">
					<p class="clearfix">
					    <label for="login">Email</label>
					    <input type="text" name="email" id="login" placeholder="Username">
					</p>
					<p class="clearfix">
					    <label for="password">Password</label>
					    <input type="password" name="password" id="password" placeholder="Password"> 
					</p>
					<p class="clearfix">
					    <input type="checkbox" name="remember" id="remember">
					    <label for="remember">nhớ mật khẩu</label>
					    <a id="register" href="#">Đăng ký</a>
					</p>
					
					<p class="clearfix">
					    <input type="submit" name="submit" value="Đăng nhập">
					</p>       
				</form>​
			</section>
			
        </div>
	
@stop

