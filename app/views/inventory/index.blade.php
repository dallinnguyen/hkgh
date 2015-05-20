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
                <h2 class="cart-top-title">Hành lý</h2>
                <div class="cart-top-info">{{$inventories->count()}} vật phẩm</div>
            </div>
            
            <ul>
                
                <li class="cart-item">
                    <!--item 1-->
                    @if ($using->slot1 != null)
                    <a href="{{URL::action('InventoryController@removeSlot', 'slot1')}}" class="cart-using-item-pic">
                        
                        <img src="{{$using->item1->photo}}">
                    </a>
                    @else
                        <span class="cart-using-item-pic">
                        <img src="../img/uploads/items/empty.jpg">
                    </span>
                    @endif
                    <!--item 2-->
                    @if ($using->slot2 != null)
                    <a href="{{URL::action('InventoryController@removeSlot', 'slot2')}}" class="cart-using-item-pic">
                        <img src="{{$using->item2->photo}}">
                    </a>
                    @else
                        <span class="cart-using-item-pic">
                        <img src="../img/uploads/items/empty.jpg">
                    </span>
                    @endif
                    <!--item 3-->
                    @if ($using->slot3 != null)
                    <a href="{{URL::action('InventoryController@removeSlot', 'slot3')}}" class="cart-using-item-pic">
                        <img src="{{$using->item3->photo}}">
                    </a>
                    @else
                        <span class="cart-using-item-pic">
                        <img src="../img/uploads/items/empty.jpg">
                    </span>
                    @endif    
                    <!--item 4-->
                    @if ($using->slot4 != null)  
                    <a href="{{URL::action('InventoryController@removeSlot', 'slot4')}}" class="cart-using-item-pic">
                        <img src="{{$using->item4->photo}}">
                    </a>
                    @else
                        <span class="cart-using-item-pic">
                        <img src="../img/uploads/items/empty.jpg">
                    </span>
                    @endif    
                    
                    <!--item 5-->
                    @if ($using->slot5 != null)  
                    <a href="{{URL::action('InventoryController@removeSlot', 'slot5')}}" class="cart-using-item-pic">
                        <img src="{{$using->item5->photo}}">
                    </a>
                    @else
                        <span class="cart-using-item-pic">
                        <img src="../img/uploads/items/empty.jpg">
                    </span>
                    @endif
                    <!--item 6-->
                    @if ($using->slot6 != null)    
                    <a href="{{URL::action('InventoryController@removeSlot', 'slot6')}}" class="cart-using-item-pic">
                        <img src="{{$using->item6->photo}}">
                    </a>
                    @else
                        <span class="cart-using-item-pic">
                        <img src="../img/uploads/items/empty.jpg">
                    </span>
                    @endif
                    
                </li>
                @foreach($inventories as $inventory)
                <li class="cart-item">
                    <span class="cart-item-pic">
                        <img src="{{$inventory->item->photo}}">
                    </span>
                    {{$inventory->item->name}}
                    <span class="cart-item-desc">Số lượng: {{$inventory->quantity}}</span>
                    <a href="{{URL::action('InventoryController@useItem', $inventory->item->id)}}">xài</a> | <a href="{{URL::action('InventoryController@removeItem', $inventory->id)}}">bỏ</a>
                </li>
                
                @endforeach
                
            </ul>
    
            <div class="cart-bottom">
                <img src="../img/uploads/items/tien.png">
                
                <span  class="gold-number" style="color:gold">
                
               
                {{$userMoney}}</span>
                <a href="{{URL::to('shop')}}" class="cart-button">Shop</a>
            </div>
        </div>
    
      
    </div>
@stop