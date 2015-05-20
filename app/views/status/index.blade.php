@extends('layout.base')

@section('head')
    
    {{ HTML::style('css/write_status.css') }}
    @stop

@section('content')
    
    <div id="wrapper">

	<form id="paper" method="get" action="">

		<div id="margin">Tiêu đề: <input id="title" type="text" name="title"></div>
		<textarea placeholder="viết status của bạn" id="text" name="text" rows="4" style="overflow: hidden; word-wrap: break-word; resize: none; height: 160px; "></textarea>  
		<br>
		<input id="button" type="submit" value="Tạo">
		
	</form>

    </div>
        
    <script>
        $(document).ready(function(){
        $('#title').focus();
        $('#text').autosize();
      });
        
    </script>
    
    @stop