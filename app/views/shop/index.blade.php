@extends('layout.base')

@section('head')
    {{ HTML::style('css/shop.css') }}
    
@stop

@section('content')
    
   
    @if(Session::has('message'))
        <div class="alert {{Session::get('alert-class')}}" role="alert">{{ Session::get('message') }}</div>
    @endif
    
    
    <div class="shop-container">
        <div class="cart">
            <div class="cart-top">
                <h2 class="cart-top-title">Cửa hàng</h2>
                <div class="cart-top-info">{{$items->count()}} vật phẩm</div>
            </div>
            @foreach($items as $item)
            <ul>
                <li class="cart-item">
                    <span class="cart-item-pic">
                        <img src="{{$item->photo}}">
                    </span>
                    {{$item->name}}
                    <span class="cart-item-desc">{{$item->description}}</span>
                    <!--green when you are able to buy, red when you are not-->
                    <span style="color:#5aa327" class="cart-item-price">{{$item->price}}</span>
                    <span class="cart-item-id">{{$item->id}}</span>
                </li>
            @endforeach
                
            </ul>
            
            <form id="buy_items" method="post" action="{{URL::to('items-buy')}}" class="cart-bottom">
                <img src="../img/uploads/items/tien.png">
                
                <input id="bought-id" type="hidden" name="boughtid" value="" />
                <input id="bought-number" type="hidden" name="boughtnumber" value="" />
                
                
                <span class="gold-number" style="color:gold">
                {{$userMoney}}
                </span>
               
                
                
                <a href="javascript:{}" onclick="document.getElementById('buy_items').submit();" class="cart-button">Mua</a>
            </form>
        </div>
    
      
    </div>
@stop

@section('footer')
    
    {{ HTML::script('js/libs/jquery-1.9.0.js'); }}
    @stop

@section('js')
  
   
    $('.cart-item').click(function(){
        brightness = $(this).css('-webkit-filter');
        
        var total = 0;
        
        
        var str = $('#bought-id').val();
       
        if (str != ''){
            idList = str.split(' ');
            
        }else
            idList = [];
        
        
        if (brightness == 'brightness(1)'){
            $(this).css({'-webkit-filter':'brightness(150%)'});
            total = parseInt($(this).find('.cart-item-price').text());
            idList.push($(this).find('.cart-item-id').text());
        }else
        {
            $(this).css({'-webkit-filter':'brightness(100%)'});
             total = -parseInt($(this).find('.cart-item-price').text());
             var removeItem = $(this).find('.cart-item-id').text();
             idList = jQuery.grep(idList, function( a ) {
                return a !== removeItem;});
        }
        total = parseInt($('.gold-number').text()) - total;
        
        console.log(idList);
        idList = idList.join(" ");
        $('.gold-number').html(total);
        $('#bought-number').val(total);
        $('#bought-id').val(idList);
        
        
        
    });
   
    
    
@stop