<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route::any('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));



//Route::post('login',array('as' => 'auth', 'uses' => 'AuthController@doLogin'));
//
//Route::get('login',array('uses' => 'AuthController@showLogin'));
//    
//Route::get('logout', array('uses' => 'AuthController@doLogout'));
Route::controller('auth','AuthController');


Route::group(array('before' => 'auth'), function () {
    
    Route::controller('game', 'GameController');
    
    Route::controller('chatroom','ChatroomController');
    
    Route::controller('profile','ProfileController');
    
    Route::controller('shop','ShopController');
    
    Route::controller('inventory','InventoryController');
    
    Route::controller('test', 'TestController'); //for testing only
    
    //Route::controller('Post','PostController');
    
    //REST
    Route::resource('attacks','AttackController');
    Route::resource('abilities','AbilityController');
    Route::resource('posts','PostController');
    Route::resource('comments','CommentController');
    
    Route::get('post-update/{id}', 'PostController@likeUpdate');
    
    Route::get('post-kill/{id}', 'PostController@killPost');
    
    Route::get('post-show/{id}', 'PostController@showPost');
    
    //inventory
    Route::get('remove-item/{id}', 'InventoryController@removeItem');
    Route::get('use-item/{id}', 'InventoryController@useItem');
    Route::get('remove-slot/{id}', 'InventoryController@removeSlot');
    
    //items
    Route::post('items-buy', 'ShopController@buyItem');
    
    
    
    //test
    
    
    
    //post
    Route::post('post-create','PostController@newPost');
    Route::post('post-edit','PostController@editPost');
    Route::get('boot-HP/{id}', 'PostController@bootHP');
    Route::get('attack-post/{id}', 'PostController@attackPost');
    
    
    //comment
    Route::get('remove-comment/{id}','PostController@removeComment');
    Route::get('like-comment/{id}','PostController@likeComment');
    Route::get('unlike-comment/{id}','PostController@unlikeComment');
    Route::post('comment-edit','PostController@editComment');
    Route::post('session-update', 'PostController@sessionUpdate');
    
    Route::post('post-comment','PostController@newComment');
    
    //facebook
    
    Route::get('login/fb','FacebookController@login');
    
    Route::get('login/fb/callback','FacebookController@loginCallback');
    
    Route::get('logout', array('uses' => 'AuthController@getLogout'));
    
    //Route::controller('/', 'HomeController');
    Route::any('/','HomeController@index');
});

//Route::group(array('before' => 'auth'), function () {
//
//    Route::controller('game', 'GameController');
//    
//    Route::controller('chatroom','ChatroomController');
//    
//    Route::get('profile', array('as' => 'profile', 'uses' => 'ProfileController@showProfile'));
//    
//    Route::get('shop', array('as' => 'shop', 'uses' => 'ShopController@showShop'));
//    
//    
//    Route::get('inventory', array('as' => 'inventory', 'uses' => 'InventoryController@showInventory'));
//    
//    Route::get('profile-edit', array('as' => 'profile-edit', 'uses' => 'ProfileController@profileEdit'));
//    
//    Route::get('profile-edited', array('as' => 'profile-edit-action', 'uses' => 'ProfileController@profileEditAction'));//
//    
//    Route::get('post-update/{id}', 'PostController@likeUpdate');
//    
//    Route::get('post-kill/{id}', 'PostController@killPost');
//    
//    Route::get('post-show/{id}', 'PostController@showPost');
//    
//    //inventory
//    Route::get('remove-item/{id}', 'InventoryController@removeItem');
//    Route::get('use-item/{id}', 'InventoryController@useItem');
//    Route::get('remove-slot/{id}', 'InventoryController@removeSlot');
//    
//    //items
//    Route::post('items-buy', 'ShopController@buyItem');
//    
//    
//    
//    //test
//    Route::any('test', 'TestController@doTesting'); //for testing only
//    //home
//    Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showIndex'));
//    //post
//    Route::post('post-create','PostController@newPost');
//    Route::post('post-edit','PostController@editPost');
//    Route::get('boot-HP/{id}', 'PostController@bootHP');
//    Route::get('attack-post/{id}', 'PostController@attackPost');
//    
//    
//    //comment
//    Route::get('remove-comment/{id}','PostController@removeComment');
//    Route::get('like-comment/{id}','PostController@likeComment');
//    Route::get('unlike-comment/{id}','PostController@unlikeComment');
//    Route::post('comment-edit','PostController@editComment');
//    Route::post('session-update', 'PostController@sessionUpdate');
//    
//    Route::post('post-comment','PostController@newComment');
//    
//    //facebook
//    
//    Route::get('login/fb','FacebookController@login');
//    
//    Route::get('login/fb/callback','FacebookController@loginCallback');
//    
//    
//});




