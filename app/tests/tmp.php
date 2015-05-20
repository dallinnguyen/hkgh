<div class="my-post">
            <a class="my-post-avatar" href="#">
           
            <img style="max-width=100px;max-height=100px" src="{{$post->user->photo}}"  class="profile-picture"/>
            </a>
            <div class="my-post-block">
        
                
                            
                <div class="my-post-content">
                    <span class="my-post-name">{{ $post->user->name }}</span>
                    <div class="my-post-HP">
                        <div class="progress">
                          <div class="progress-bar"></div>
                        </div>
                    </div>
                    <h1 class="my-post-fonction"> {{ $post->created_at() }} | <a href='#' class='my-post-likes-status' style="color:green">{{$post->likes->count()}} likes</a></h1>
        
                    <p class="my-post-presentation">
                    {{$post->content}}
                    </p>
                    
                    @foreach($post->comments as $comment)
                    <p class="my-post-comment">
                        <span style='color:red'>
                        
                        {{$comment->user->name}}
                        
                        </span> {{$comment->content}}
                        
                        
                        <p class='my-comment-status'><a class='my-comment-likes-status' href='#'>{{$comment->likes->count() }} likes</a> | {{$comment->created_at()}}
                        <!--<a class='my-post-status' href="#" >Reply </a>-->
                        <a class='my-like-button' href="#" >Like</a>
                        </p>
                            
                        
                    </p>
                    @endforeach
                        
                    
        
                </div>
                    
                
                
                <ul class="my-post-button">
                
                <a class='my-post-like' href="{{URL::action('PostController@likeUpdate', $post->id)}}">
                <li style="solid #0088bb;">
                Like</li></a>
                    
                <a class='my-post-comment-button' href="#">
                <li style="solid #0088bb;">
                Comment</li></a>
                    
                <a class='my-post-chem' href="#">
                <li style="solid #0088bb;">
                Chém</li></a>
                    
                </ul>  
                
            </div>
        </div>