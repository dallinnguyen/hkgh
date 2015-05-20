@extends('layout.base')

@section('browser')
    <!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="vn"> <![endif]-->
    <!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="vn"> <![endif]-->
    <!--[if IE 8]> <html class="lt-ie9" lang="vn"> <![endif]-->
    <!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
@stop

@section('head')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Profile Edit Form</title>
 {{ HTML::style('css/profile_edit.css') }}
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->    
@stop

@section('content')
    
  <h1 class="register-title">Chỉnh sửa thông tin hiệp khách</h1>
    {{ Form::open(array('action' => 'profile-edit-action', 'class'=>'register', 'id'=>'usrform')) }}
  
    <input type="text" name='name' class="register-input" placeholder="Tên hiệp khách">
    <div class="register-switch">
    
        
      <input type="radio" name="sex" value="F" id="sex_f" class="register-switch-input" checked>
      <label for="sex_f" class="register-switch-label">Chính phái</label>
      <input type="radio" name="sex" value="M" id="sex_m" class="register-switch-input">
      <label for="sex_m" class="register-switch-label">Tà phái</label>
    </div>
    <!--<input type="text" name='self-intro' class="register-input" placeholder="Giới thiệu bản thân">-->
    <textarea name='self-intro' class="text-area-register-input" cols="45" rows="8" placeholder="Giới thiệu bản thân"></textarea>
    <!--<input type="password" class="register-input" placeholder="Password">-->
    <input type="submit" value="Cập nhật" class="register-button">
    {{ Form::close() }}
    
    
    
    
@stop