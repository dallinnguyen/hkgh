@extends('layout.base')

@section('head')
    
    {{ HTML::style('css/watch-widget.css') }}
    {{ HTML::style('css/post.css') }}
    
    
    
    @stop

@section('content')
    
<!--post..................................................................................-->


   

<div class="col-md-8">
    
    

    @if (Auth::check())
        Hi {{Auth::user()->name}}
        <?php $user = Auth::user(); ?>
        
    @endif
    
    
    
    
    
    <div class="row">            
            <form id="new-post" method="post" action="{{URL::to('post-create')}}" class="my-post-form">
                
                <a href='#'> 
                <img src="../img/uploads/profiles/kiem-ma.jpg" class="profile-picture"/>
                </a>
                
                <div class="my-post-block-form">
                    <div class="my-post-content-form">
                        <!--hardcode need to change-->
                        <span class="my-post-name">viết bài</span> 
                        <!--<h1 class="my-post-fonction">Freelancer</h1>-->
                        <textarea name='post' class="form-control" rows="3" ></textarea>
                    </div>
                    <ul class="my-post-button">
                    <a @{{action 'createPost'}} href="" class='my-post-create' >
                    <li style="solid #0088bb;">
                    Post
                    </li></a>
                    
                    </ul>
                </div>
                
                
            </form>
            <form style="display: none;" id="new-comment" method="post" action="{{URL::to('post-comment')}}" class="my-post-form">
                
                <a href='#'> 
                <img src="../img/uploads/profiles/kiem-ma.jpg" class="profile-picture"/>
                </a>
                
                <div class="my-post-block-form">
                    <div class="my-post-content-form">
                        <!--hardcode need to change-->
                        <span class="my-post-name">viết comment</span> 
                        <!--<h1 class="my-post-fonction">Freelancer</h1>-->
                        <textarea name='post' class="form-control" rows="3" ></textarea>
                        <input id="post-id1" type="hidden" name="postid" value="" />
                    </div>
                    <ul class="my-post-button">
                    <a @{{action createComment}} href="" class='my-post-create' >
                    <li style="solid #0088bb;">
                    Comment
                    </li></a>
                    <a href="#" id="create-post-from-comment" class='my-post-create' >
                    <li style="solid #0088bb;">
                    Viết bài mới
                    </li></a>
                    
                    </ul>
                </div>
                
                
            </form>
            <form style="display: none;" id="post-edit" method="post" action="{{URL::to('post-edit')}}" class="my-post-form">
                
                <a href='#'> 
                <img src="../img/uploads/profiles/kiem-ma.jpg" class="profile-picture"/>
                </a>
                
                <div class="my-post-block-form">
                    <div class="my-post-content-form">
                        <!--hardcode need to change-->
                        <span class="my-post-name">sửa nội dung bài viết</span> 
                        <!--<h1 class="my-post-fonction">Freelancer</h1>-->
                        <textarea name='post' class="form-control" rows="3" ></textarea>
                        <input id="post-id2" type="hidden" name="postid" value="" />
                    </div>
                    <ul class="my-post-button">
                    
                    <a @{{action 'editPost'}} href="" class='my-post-create' >
                    
                    <li style="solid #0088bb;">
                    Sửa
                    </li></a>
                    <a href="#" id="create-post-from-edit" class='my-post-create' >
                    <li style="solid #0088bb;">
                    Viết bài mới
                    </li></a>
                    </ul>
                </div>
                
            </form>
                
            
            <form style="display: none;" id="comment-edit" method="post" action="{{URL::to('comment-edit')}}" class="my-post-form">
                
                <a href='#'> 
                <img src="../img/uploads/profiles/kiem-ma.jpg" class="profile-picture"/>
                </a>
                
                <div class="my-post-block-form">
                    <div class="my-post-content-form">
                        <!--hardcode need to change-->
                        <span class="my-post-name">sửa nội dung comment</span> 
                        <!--<h1 class="my-post-fonction">Freelancer</h1>-->
                        <textarea name='post' class="form-control" rows="3" ></textarea>
                        <input id="comment-id" type="hidden" name="commentid" value="" />
                    </div>
                    <ul class="my-post-button">
                    <a href="javascript:{}" onclick="document.getElementById('comment-edit').submit();" class='my-post-create' >
                    <li style="solid #0088bb;">
                    Sửa
                    </li></a>
                    <a href="#" id="create-post-from-edit2" class='my-post-create' >
                    <li style="solid #0088bb;">
                    Viết bài mới
                    </li></a>
                    </ul>
                </div>
                
                
            </form>
        
   </div>
    
    <div style="width: 600px;" class="row">
        
        <!--insert posts here-->
        @if(isset($posts))
            
            
            <div class="postsScrolling">
            @{{render 'posts'}}
            </div>
            @if(!isset($readingPost))
                <?php
                    $readingPost = $posts->first();
                ?>
            @endif
            
            
            
        @endif
        
        
    </div>
    @{{outlet "index/post"}}
    
    
</div>
    
     

<div class="col-md-4">



<!--calendar-->
    <div class="watch-widget">
        <div class="cover"></div>
        <a href="#" id="watch"><div class="avatar"></div></a>
        <div class="bilgi">
          <h6>Hiệp khách giang hồ</h6>
        </div>
            
        <div class="saat">
        
        <div class="clock">
              <span id="hours"> </span>: <span id="min"> </span>
        </div>
        
        </div>
    </div>
<!--end calendar-->
   
    
    <div style="display:none;" class="chat-widget">
                <div class="chatter-header">
                    <a href="#" id="chatter"><div class="chat-avatar"></div></a>
                    <p style="font-size:30px;text-align:center">Chat</p>
                </div>
                <div class="chatter-main">
                    @{{#each messages}}
                            <p>
                                <span style="color:green">@{{user_name}}</span> : <span style="color:black">@{{message}}</span>
                            </p>
                    @{{/each}}
                </div>
            
            
        
                <div class="input-group chatter-input-group">
                    @{{input id="chatter-input" action="send" type="text" class="form-control"}}
                    
                    <span class="input-group-btn">
                    <button class="btn btn-default" @{{action "send"}}>gửi</button>
                         
                    </span>
                </div> 
        </div>
    
    
    
<!--chatter-->
   
</div>

@stop
@section('ember')
    <script type="text/x-handlebars" data-template-name="posts">
        @{{#each }}
        
                
                
                <div class="my-post-new">
                    
                    <a href="" @{{action 'toThePost' this}}>
                        <img class="my-post-new-avatar-img" @{{bind-attr src=user.photo}} />

                    </a>
                </div>
                
        @{{/each}}
    </script>
        
    
  <script type="text/x-handlebars" data-template-name="index/post">
    
    @{{#unless isEmpty}}
        <div class="my-post">
            <a class="my-post-avatar" href="#">
           
            <img style="max-width=100px;max-height=100px" @{{bind-attr src=user.photo}}  class="profile-picture"/>
            </a>
            <div class="my-post-block">
    
                <div id="my-post-content" class="my-post-content">
                    <span class="my-post-name">@{{user.name }}</span>
                    
                    
                    <div class="my-post-HP">
                        <div class="progress">
                          <div class="progress-bar" @{{bind-attr style=HPstyle}}></div>
                        </div>
                    </div>
                    
                   @{{#if disable}}
                    <p style="color:red">trạng thái: bất lực =))</p>
                   @{{/if}}
                    
                    <h1 class="my-post-fonction">
                    @{{created_at}}
                    
                    | <a href='#' class='my-post-likes-status' style="color:green">@{{likescount}} likes</a></h1>
        
                    <p class="my-post-presentation">
                    @{{post_content}}
                    </p>
                    
                    @{{#each comments itemController="comment"}}
                        <p class="my-post-comment">
                            <span style='color:green'>
                            
                            @{{user.name}}
                            
                            </span>
                                
                            <span class="my-comment-content">@{{comment_content}}</span>
                                
                            <p class='my-comment-status'>@{{created_at}} | <a class='my-comment-likes-status' href='#'>@{{likescount}} likes</a>
                                @{{#unless  disable}}
                                    @{{#unless didHelike}}
                                        <a class='my-like-button' href="" >Like
                                        </a>
                                    @{{else}}
                                        <a class='my-unlike-button' href="" >Unlike
                                        </a>
                                    @{{/unless}}
                                    
                                    @{{#if isYourComment}}
                                        |
                                        <a class='my-edit-button' href="" >sửa</a>
                                         | 
                                        <a class='my-remove-button' href="">xóa</a>
                                        
                                    @{{/if}}
                                    
                                @{{/unless}}
                            
                            </p>
                        </p>
                    @{{/each}}
                
                </div>
                
                <ul class="my-post-button">
                @{{#unless didILike}}
                    <a @{{action 'likePost'}} class='my-post-like' href="">
                    <li style="solid #0088bb;">
                    Like</li></a>
                @{{/unless}}
                @{{#if canIComment}}
                    <a href="" @{{action 'createPostComment'}}>
                    <li style="solid #0088bb;">
                    Comment</li></a>
                @{{/if}}
                
                @{{#if canIEdit}}
                    <a href="" @{{action editPost}}>
                    <li style="solid #0088bb;">
                    Sửa</li></a>
                @{{/if}}
               
               
               
                @{{#if canIAttack}}
                    <a @{{action 'attackPost'}} class='my-post-chem' href="">
                    <li style="solid #0088bb;">
                    Chém</li></a>
                @{{/if}}
                
                @{{#if canIBootHP}}
                    <a class='my-post-HPboot' href="">
                    <li style="solid #0088bb;">
                    tăng máu</li></a>
                @{{/if}}
                
                @{{#if canIKill}}
                    <a class='my-post-kill' href="">
                    <li style="solid #0088bb;color:red">
                    Kill</li></a>
                @{{/if}}
                    
                </ul>  
                
                
                
                
            </div>
        </div>
    @{{/unless}}
  </script>
@stop
@section('footer')
    
    
        
    {{-- HTML::script('js/shared.js'); --}}
@stop
@section('js')
    
    
    <?php
        if (isset($commentCreated)){
            ?>
            comment = $('.my-post').find('.my-post-content');
            height = comment[0].scrollHeight;
            
            <!--another solution is animate-->
            
            <!--$comment.animate({scrollTop: height});-->
            comment.scrollTop(height);
            <?php
        }
        
        if (Session::has('cmdheight')) { ?>
            comment = $('.my-post').find('.my-post-content');
            height = {{Session::get('cmdheight');}};
            comment.scrollTop(height);
            
        <?php }
        
    ?>
    
    
    $( document ).ready(function() {
    
    <!--user related information first load-->
    <!--ability -->
    
        <!--get all the data into mvc client side here-->
        @if(isset($posts))
            @foreach($posts as $post)
                var post = store.push('post',{
                    "id"            : {{$post->id}},
                    "post_content": "{{$post->content}}",
                    "HP": {{$post->HP}},
                    "user" : {{$post->user_id}},
                    'created_at': "{{$post->created_at}}",
                });
                <!--bug 6 post 6 users -> wrong-->
                
                store.push('user',{
                    'id' : {{$post->user->id}},
                    'username' : "{{$post->user->username}}",
                    'email' : "{{$post->user->email}}",
                    'name' : "{{$post->user->name}}",
                    'gender' : "{{$post->user->gender}}",
                    'link' : "{{$post->user->link}}",
                    'about' : "{{$post->user->about}}",
                    'photo' : "{{$post->user->photo}}",
                    'money' : {{$post->user->money}},
                    'role' : "{{$post->user->role}}",
                });
                
                
                @foreach($post->comments as $comment)
                    var comment = store.push('comment',{
                    "id"             : {{$comment->id}},
                    "post"           : {{$post->id}},
                    "user"           : {{$comment->user_id}},
                    "comment_content": "{{$comment->content}}",
                    'created_at': "{{$comment->created_at()}}",
                    });
                    
                    post.get('comments').pushObject(comment);
                    @foreach($comment->likes as $like)
                        var like = store.push('like',{
                        "id"             : {{$like->id}},
                        "user"           : {{$like->user_id}},
                        });
                        comment.get('likes').pushObject(like);
                    @endforeach
                    
                    store.push('user',{
                        'id' : {{$comment->user->id}},
                        'username' : "{{$comment->user->username}}",
                        'email' : "{{$comment->user->email}}",
                        'name' : "{{$comment->user->name}}",
                        'gender' : "{{$comment->user->gender}}",
                        'link' : "{{$comment->user->link}}",
                        'about' : "{{$comment->user->about}}",
                        'photo' : "{{$comment->user->photo}}",
                        'money' : {{$comment->user->money}},
                        'role' : "{{$comment->user->role}}",
                    });
                    
                @endforeach
                @foreach($post->likes as $like)
                    var like = store.push('like',{
                    "id"             : {{$like->id}},
                    "user"           : {{$like->user_id}},
                    "post"           : {{$post->id}},
                    
                    });
                    post.get('likes').pushObject(like);
                @endforeach
                
                <!--attacks of every post-->
                @foreach($post->attacks as $attack)
                store.push('attack',{
                    id: {{$attack->id}},
                    user: {{$attack->user->id}},
                    post: {{$post->id}},
                    damage: {{$attack->damage}}
                });
                @endforeach
            @endforeach
        store.push('ability',{
            id: {{Auth::user()->ability->id}},
            damage: {{Auth::user()->ability->damage}},
            drink: {{Auth::user()->ability->drink}}
        });
        
        
        @endif
    });
    
    <!--router-->

    <!--model-->
    App.ApplicationSerializer = DS.LSSerializer.extend();
    App.ApplicationAdapter = DS.LSAdapter.extend({
        namespace: 'hkgh'
    });
    
    
   
    App.Message = DS.Model.extend({
        "user_id"       : DS.attr("integer"),
        "user_name"     : DS.attr("string"),
        "message"       : DS.attr("string")
    });
    App.User = DS.Model.extend({
        username: DS.attr("string"),
        email: DS.attr("string"),
        name: DS.attr("string"),
        gender: DS.attr('string'),
        link: DS.attr('string'),
        about: DS.attr('text'),
        photo: DS.attr('string'),
        money: DS.attr('integer'),
        role: DS.attr('string'),
        post: DS.hasMany('post'),
        likes: DS.hasMany('like')
    });
    App.Likable = DS.Model.extend({
        likes: DS.hasMany('like')
    });
    
    App.Like = DS.Model.extend({
        user : DS.belongsTo('user'),
        likable: DS.belongsTo('likable', { polymorphic: true})
    });
    
    App.Post = App.Likable.extend({
        'post_content' : DS.attr('text'),
        'HP' : DS.attr('integer'),
        'user': DS.belongsTo('user'),
        'created_at': DS.attr('datetime'),
        'comments': DS.hasMany('comment'),
        
    });
    
    App.Comment = App.Likable.extend({
        'post' : DS.belongsTo('post'),
        'user' : DS.belongsTo('user'),
        'comment_content' : DS.attr('text'),
        'created_at': DS.attr('datetime'),
        
    });
    
    App.Ability = DS.Model.extend({
        user: DS.belongsTo('user'),
        damage: DS.attr('integer'),
        drink: DS.attr('integer')
    });
    
    App.Attack = DS.Model.extend({
        user: DS.attr('integer'),
        post: DS.attr('integer'),
        damage: DS.attr('integer')
    });
    
        <!--route-->
        
    
    
    App.IndexRoute = Ember.Route.extend({
        init : function() {
            store = this.store;
        },
        model : function () {
            return Ember.RSVP.hash({
            messages: store.find("message"),
            posts: store.find("post"),
            comments: store.find("comment"),
            Attacks: store.find('attack'),
            abilities: store.find("ability"),
            });
        },
        
        renderTemplate: function(controller, model) {
            this.render();
            
            this.render('index/post',{
            outlet:'index/post',
            into:'index',
        });
        },
        
        setupController: function(controller, model){
            var posts = model.posts;
            var comments = model.comments;
            var messages = model.messages;
            var abilities = model.abilities;
            var attacks = model.attacks;
            <!--controller.set('posts', posts);-->
            controller.set('messages', messages);
            controller.set('comments', comments);
            controller.set('abilities', abilities);
            controller.set('attacks', attacks);
        
            this.controllerFor('posts').set('model', posts);
        }
        
    });
    
    
    
    <!--controller-->
    App.IndexController = Ember.ArrayController.extend({
        
        
        
        "command" : null,
        
        "actions" : {
    
            "send" : function(key) {
                
                
                var command = $('#chatter-input').val();
                $('#chatter-input').val('');
                
                store.push("message", {
                            "id"            : id++,
                            "user_id"       : 1,
                            "user_name"     : "{{Auth::user()->name}}",
                            
                            "message"       : command
                        });
                
                if (command.indexOf("/name") === 0) {
                    
                    socket.send(JSON.stringify({
                        "type" : "name",
                        "data" : command.split("/name")[1]
                    }));
    
                } else {
    
                    socket.send(JSON.stringify({
                        "type" : "message",
                        "data" : command
                    }));
    
                }
    
                this.set("command", null);
            },
            "load" : function(){
                alert(this.get('post.id'));
            },
            <!--link to post-->
            toThePost:  function(model){
                $('#new-post').css({'display':'block'});
                $('#post-edit').css({'display':'none'});
                $('#comment-edit').css({'display':'none'});
                $('#new-comment').css({'display':'none'});
                $('#new-post').find('.form-control').focus();
            
                this.transitionToRoute('index.post', model);
            },
            
            <!--web socket function-->
            createPost: function(){
                var post = $('#new-post').find('.form-control');
                var postContent = post.val();
                
                socket.send(JSON.stringify({
                        "type" : "post",
                        "data" : postContent
                    }));
                post.val("");
            },
            <!--send not only the content but also user-id post-id-->
            createComment: function(){
                var id = $('#post-id1').val();
                 var cmt = $('#new-comment').find('.form-control');
                var cmtContent = cmt.val();
                
                socket.send(JSON.stringify({
                        "type" : "create-comment",
                        "data" : {
                                "postid" :  id,
                                "postcontent" : cmtContent
                                },
                        }));
                cmt.val("");
               
            },
            
            editPost: function(){
            
                var id = $('#post-id2').val();
                var post = $('#post-edit').find('.form-control');
                var postContent = post.val();
                
                socket.send(JSON.stringify({
                        "type" : "edit-post",
                        "data" : {
                                "postid" :  id,
                                "postcontent" : postContent
                                },
                        }));
                    
                post.val("");
                
            }
        }
    });
    
    App.PostsController = Ember.ArrayController.extend({
        
        sortProperties: ['created_at'],
        sortAscending: false,
        
    });
    
    
    App.IndexPostController = Ember.ObjectController.extend({
    
    
    
    isEmpty: function(){
        
        if (this.get('id') == undefined){
            
            return true;
        }
        return false;
    }.property("post_content"),
    HPcolor: '86e01e',
    unit: "%",
    HPstyle: function(){
            var hp = this.get('HP');
            if (hp > 75)
                this.set('HPcolor','86e01e');
            else if(hp > 50)
                this.set('HPcolor','f2d31b');
            else if(hp > 25)
                this.set('HPcolor','f2b01e');
            else if(hp > 5)
                this.set('HPcolor','f27011');
            else
                this.set('HPcolor','FF0000');
            return 'background-color:%@%@' . fmt('#',this.get('HPcolor')) + ';width: %@%@'.fmt(hp, this.unit);
    }.property('HP'),
    
    disable: function(){
        var hp = this.get('HP');
        if (hp > 1)
            return false;
        return true;
    }.property('HP'),
    
    didILike: function(){
        
        
        var likes = this.get('likes');
        var tmp = false;
        
        likes.every(function(item){
            if (item.get('user.id') == {{Auth::user()->id}}){
                tmp = true;
                
            }
        });
            
        return tmp;
    }.property('likes.length'),
    
    likescount: function() {
        
        return this.get('likes.length');
      
    }.property('likes.length'),
    
    canIComment: function(){
            
            if (!this.get('disable')){
                return true;
            }
            
            return false;
    }.property('disable'),
    
    canIEdit: function(){
            
            if ((this.get('user.id') == {{Auth::user()->id}}) &&(!this.get('disable'))){
                
                return true;
            }
            
            return false;
        }.property('user,disable'),
    
    
    
    canIAttack: function(){
        
        var query = new Kinvey.Query();
        query.equalTo('Damage', 10);
        store.find('attack',query).then(function (attack){
            
            alert(attack.get('damage'));
        },function(error) {
            alert('bla bla bla');
        });
        store.find('ability').then(function (user) {
            
            store.findQuery('attack',{userId: {{Auth::user()->id}},postId: this.get('id')}).then(function (attack){
                return false;
            },function(error) {
                return true;
            });
 
        }.bind(this),function(error) {
            return false;
        });
    }.observes('HP'),
    
    canIBootHP: function(){
        return true;
    },
    
    canIKill: function(){
        return true;
    },
    
    
    
    actions: {
            createPostComment: function(){
                $('#new-post').css({'display':'none'});
                $('#post-edit').css({'display':'none'});
                $('#comment-edit').css({'display':'none'});
                $('#new-comment').css({'display':'block'});
                $('#new-comment').find('.form-control').focus();
                
                $('#post-id1').val(this.get('id'));
                },
            editPost: function(){
                
                $('#new-post').css({'display':'none'});
                $('#new-comment').css({'display':'none'});
                $('#comment-edit').css({'display':'none'});
                $('#post-edit').css({'display':'block'});
                $('#post-edit').find('.form-control').focus();
                
                var postContent = this.get("post_content");
                
                $('#post-edit').find('.form-control').text(postContent);
                $('#post-id2').val(this.get('id'));
                },
            },
            likePost: function(){
                socket.send(JSON.stringify({
                        "type" : "like-post",
                        "data" : this.get('id')
                        }));
            },
            attackPost: function(){
                
                
                store.find('ability', 1).then(function(ability){
                    
                    var damage = ability.get('damage');
                    var currentHP = this.get('HP');
                    var hp = currentHP - damage;
                    if (hp < 1)
                        hp = 1;
                    
                    this.set('HP',hp);
                    
                    socket.send(JSON.stringify({
                            "type" : "attack-post",
                            "data" : {
                                    "postid" :  this.get('id'),
                                    "damage" : damage
                                    },
                    }));
                    
                }.bind(this));
                
                    
                
            },
            
    })
    
    App.CommentController = Ember.ObjectController.extend({
        
        
        
        likescount: function() {
            return this.get('likes.length');
        }.property('likes.length'),
        
        <!--need to be improved-->
        didHelike: function(){
            var likes = this.get('likes');
            var tmp = false;
            likes.every(function(item){
                if (item.get('user.id') == {{Auth::user()->id}}){
                    tmp = true;
                }
            });
            
            return tmp;
            
        }.property('likes'),
        
        isYourComment: function(){
            
            if (this.get('user.id') == {{Auth::user()->id}}){
                
                return true;
            }
            
            return false;
        }.property('user'),
        
        
        actions: {
            
        },
        
    });
    
    
    
try {
    var id = 1;
    if (!WebSocket) {
        console.log("no websocket support");
    } else {
        var socket = new WebSocket("{{Config::get("app.wsUrl")}}");
        var id     = 1;
        socket.addEventListener("open", function (e) {
             console.log("open: ", e);
             socket.send(JSON.stringify({
                    "type" : "id_update",                    
                    "data" : {{Auth::user()->id}}
   
            }));
        });
        socket.addEventListener("error", function (e) {
            console.log("error: ", e);
        });
        socket.addEventListener("message", function (e) {
            var data      = JSON.parse(e.data);
            console.log(data);
            var user_id   = data.user.id;
            var user_name = data.user.name;
            
            
            switch (data.message.type) {
                case "name":
                    $(".name-" + user_id).html(user_name);
                    break;
                case "message":    
                    store.push("message", {
                        "id"            : id++,
                        "user_id"       : user_id,
                        "user_name"     : user_name || "undefined",
                        
                        "message"       : data.message.data,
                    });
                    break;
                case "post":
                    
                    var id = data.message.data.id;
                    var content = data.message.data.content;
                    var created_at = data.message.data.created_at;
                    store.push('post',{
                    "id"            : id,
                    "post_content": content,
                    "HP": 100,
                    "user" : user_id,
                    'created_at': created_at,
                    });
                    
                    break;
                case "create-comment":
                    var id = data.message.data.id;
                    var content = data.message.data.content;
                    var created_at = data.message.data.created_at;
                    var post_id = data.message.data.post_id;
                   
                    var comment = store.push('comment',{
                    "id"             : id,
                    "post"           : post_id,
                    "user"           : user_id,
                    "comment_content": content,
                    'created_at': created_at,
                    });
                    
                    store.find('post', post_id).then(function (post) {
                        post.get('comments').pushObject(comment);
                    });
                    
                    break;
                case "like-post":
                    var id = data.message.data.id;
                    var post_id = data.message.data.likable_id;
                    var like = store.push('like',{
                        "id"             : id,
                        "user"           : user_id,
                        });
                    store.find('post', post_id).then(function (post) {
                        post.get('likes').pushObject(like);
                    });
                        
                    break;
                    
                case "edit-post":
                    var id = data.message.data.id;
                    var content = data.message.data.content;
                    <!--var updated_at = data.message.data.updated_at;-->
                    
                    store.find('post', id).then(function (post) {
                        post.set('post_content',content);
                    });
                    
                    break;
                    
                case "attack-post":
                    var id = data.message.data.id;
                    var postId = data.message.data.post_id;
                    var damage = data.message.data.damage;
                    
                    var attack = store.push('attack',{
                        "id" :  id,
                        "user" : user_id,
                        "post" : postId,
                        "damage" : damage
                    });
                    
                    store.find('post', postId).then(function (post) {
                        if (user_id != {{Auth::user()->id}}){
                            var hp = post.get('HP');
                            hp = hp - damage;
                            if (hp < 1)
                                hp = 1;
                            post.set('HP',hp);
                        }
                    });
                    
                    break;
            }
        });
        
        window.socket = socket; // debug
    }
} catch (e) {
    console.log("exception: " + e);
}
    

    
    
    <!--post zoom-->
    <!--$('.my-post-avatar').click(function(){-->
    <!--    var height = $(this).parent('.my-post').css('height');-->
    <!--    if (height == '142px'){-->
    <!--        $(this).parent('.my-post').css({'height':'242px'});-->
    <!--        $(this).next('div').css({'height':'242px'});-->
    <!--        $(this).next('div').find(".my-post-content").css({'height':'220px'});-->
    <!--    }else if(height == '242px'){-->
    <!--        $(this).parent('.my-post').css({'height':'142px'});-->
    <!--        $(this).next('div').css({'height':'142px'});-->
    <!--        $(this).next('div').find(".my-post-content").css({'height':'120px'});-->
    <!--    }-->
    <!--});-->
    
    
    <!--$('.my-post-avatar-top').click(function(){-->
    <!--    var height = $(this).parent('.my-post-top').css('height');-->
    <!--    if (height == '142px'){-->
    <!--        $(this).parent('.my-post-top').css({'height':'242px'});-->
    <!--        $(this).next('div').css({'height':'242px'});-->
    <!--        $(this).next('div').find(".my-post-content").css({'height':'220px'});-->
    <!--    }else if(height == '242px'){-->
    <!--        $(this).parent('.my-post-top').css({'height':'142px'});-->
    <!--        $(this).next('div').css({'height':'142px'});-->
    <!--        $(this).next('div').find(".my-post-content").css({'height':'120px'});-->
    <!--    }-->
    <!--});-->
    
    <!--post zoom end-->
    
    
    
    <!--chem trigger-->
    <!--$(document).on("click", ".my-post-chem", function(e){-->-->
    <!---->
    <!--    e.preventDefault();-->
    <!--    var parent = $(this).parent('.my-post-button');-->
    <!--    @if (isset($readingPost))-->
    <!--        var hp = {{$readingPost->HP - $user->ability()->first()->damage}};-->
    <!--        if (hp < 1)-->
    <!--            hp = 1;-->
    <!--        hp = hp + '%';-->
    <!--    @endif-->
    <!--    parent.prev('div').find('.progress-bar').css({'width':hp});-->
    <!--    @if ($user->role != 'master')-->
    <!--        $(this).hide();-->
    <!--    @endif-->
    <!--    var href = $(this).attr('href');-->
    <!--    -->
    <!--    var delay=200;//0.1 seconds-->
    <!--    setTimeout(function(){-->
    <!--    -->
    <!--    window.location.href = href;-->
    <!--    },delay);-->
    <!---->
    <!--});-->
    
    <!--end chem trigger-->
    
    <!--boot hp trigger-->
    <!--$(document).on("click", ".my-post-HPboot", function(e){-->
    <!---->
    <!--    e.preventDefault();-->
    <!--    var parent = $(this).parent('.my-post-button');-->
    <!--    @if (isset($readingPost))-->
    <!--        var hp = {{$readingPost->HP + $user->ability()->first()->drink}};-->
    <!--        if (hp > 100)-->
    <!--            hp = 100;-->
    <!--        hp = hp + '%';-->
    <!--    @endif-->
    <!--    parent.prev('div').find('.progress-bar').css({'width':hp});-->
    <!--    -->
    <!--    var href = $(this).attr('href');-->
    <!--    -->
    <!--    var delay=200;//0.1 seconds-->
    <!--    setTimeout(function(){-->
    <!--    -->
    <!--    window.location.href = href;-->
    <!--    },delay);-->
    <!---->
    <!--});-->
    
    <!--end boot hp trigger-->
    
    
    
    <!--end comment trigger-->
    
    <!--create new post buttion from comment-->
    $(document).on("click", "#create-post-from-comment", function(){
    
        $('#new-post').css({'display':'block'});
        $('#post-edit').css({'display':'none'});
        $('#comment-edit').css({'display':'none'});
        $('#new-comment').css({'display':'none'});
        $('#new-post').find('.form-control').focus();
    });
    
    $(document).on("click", "#create-post-from-edit", function(){
    
        $('#new-post').css({'display':'block'});
        $('#new-comment').css({'display':'none'});
        $('#post-edit').css({'display':'none'});
        $('#comment-edit').css({'display':'none'});
        $('#new-post').find('.form-control').focus();
    });
    <!--create a post from a comment of yours-->
    $(document).on("click", "#create-post-from-edit2", function(){
    
        $('#new-post').css({'display':'block'});
        $('#new-comment').css({'display':'none'});
        $('#post-edit').css({'display':'none'});
        $('#comment-edit').css({'display':'none'});
        $('#new-post').find('.form-control').focus();
    });
    
    <!--edit your comment from a post-->
    
    
    <!--end edit trigger    -->
    
    
    
   
    
    
    
    
    <!--switch widgets's coding-->
    $(document).on("click", "#watch", function(){
        
        $(this).parent('.watch-widget').css({'display':'none'});
        $('#chatter').parent('.chatter-header').parent('.chat-widget').css({'display':'block'});
    });
   $(document).on("click", "#chatter", function(){
        $(this).parent('.chatter-header').parent('.watch-widget').css({'display':'none'});
        $('#watch').parent('.chat-widget').css({'display':'block'});
    });
    <!--end switch widgets's coding-->
    
    
    
    <!--clock.........................................................-->
    $(document).ready(function() {
        // Create two variable with the names of the months and days in an array
        <!--var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; -->
        <!--var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]-->
        
        // Create a newDate() object
        var newDate = new Date();
        // Extract the current date from Date object
        newDate.setDate(newDate.getDate());
        // Output the day, date, month and year   
        <!--$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());-->
        
        setInterval( function() {
                // Create a newDate() object and extract the seconds of the current time on the visitor's
                var seconds = new Date().getSeconds();
                // Add a leading zero to seconds value
                $("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
                },1000);
                
        setInterval( function() {
                // Create a newDate() object and extract the minutes of the current time on the visitor's
                var minutes = new Date().getMinutes();
                // Add a leading zero to the minutes value
                $("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
            },1000);
                
        setInterval( function() {
                // Create a newDate() object and extract the hours of the current time on the visitor's
                var hours = new Date().getHours();
                // Add a leading zero to the hours value
                $("#hours").html(( hours < 10 ? "0" : "" ) + hours);
            }, 1000);	
        });
    <!--end clock.........................................................-->
    
    @stop
