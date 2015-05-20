@extends('layout.base')

@section('browser')
    <!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
    <!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
    <!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
    <!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
@stop

@section('head')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Profile Form</title>
 {{ HTML::style('css/profile1.css') }}
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->    
@stop

@section('content')
    <div id="container">
  <div class="image" style="background-image: url('img/phai-van.jpg');"></div>
  <div class="info">
    <h1 class="name">Ma kiếm lang</h1>
    <h3 class="position"><a href="#">Tà phái</a></h3>
    <p>giới tính: Nam</p>
    <p>Ma kiếm lang, đệ tử của Kiếm Vương. Phụng lệnh Kiếm Vương xuống Trung Nguyên tìm cuốn bí kíp võ công của Kiếm Ma. Nhưng lại bị cuốn vào thứ võ công ma quái của Kiếm Ma, mất kiểm soát dẫn đến giết người hàng loạt, được giang hồ mệnh danh là Ma Kiếm Lang.</p>
    
  </div>
  <div class="footer">
    <a href={{ URL::route('profile-edit') }}>edit</a>
  </div>
</div>  
    
    
@stop