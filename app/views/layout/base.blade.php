
<html>
    @yield("browser")
    <head>
        <title>@yield('title', 'hiep khach giang ho')</title>
        <!-- Modernizr -->
        <!-- {{ HTML::script('js/modernizr.js') }} -->
        <!--
        {{ HTML::style('css/bootstrap.min.css'); }}
        {{ HTML::style('css/bootstrap-theme.min.css'); }}
        {{ HTML::style('css/styles.css'); }}
        -->

        {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css') }}
        {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css') }}
        {{ HTML::style('css/styles.css') }}
        
        <!-- for chatroom -->
        @yield('head')
    </head>
    <body>
        <script type="text/x-handlebars">
        
            @{{outlet}}
        </script>
         <script type="text/x-handlebars" data-template-name="index">
        <div class="container">
            <!-- Static navbar -->
            <div class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                </div>
                <div class="navbar-collapse collapse">
                    @include('layout.navbar')
                </div>
            </div>

            <!-- Main component for a primary marketing message or call to action -->
            <div class="">
                @yield('content')
                
            </div>
        </div> 
         </script>
        
        @yield('ember')
        <!-- javascript libs -->
        
        <!-- jQuery -->
        {{-- HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js') --}}
        {{-- HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') --}}
        
        <!-- Latest compiled and minified JavaScript -->
        {{-- HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js') --}}
        
        {{-- HTML::script('//cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0-alpha.4/handlebars.min.js') --}}
        
        {{-- HTML::script('//cdnjs.cloudflare.com/ajax/libs/ember.js/1.5.1/ember.min.js') --}}
        
        {{-- HTML::script('//cdnjs.cloudflare.com/ajax/libs/ember-data.js/1.0.0-beta.7/ember-data.min.js') --}}
        
        {{-- HTML::script('js/shared.js') --}}
        {{ HTML::script('js/libs/jquery-1.9.0.js'); }}
        {{ HTML::script('js/libs/handlebars-v1.3.0.js'); }}
        
        {{ HTML::script('js/libs/ember.js'); }}
        {{ HTML::script('js/libs/ember-data.min.js'); }}
        {{ HTML::script('js/libs/localstorage_adapter.js'); }}
        {{ HTML::script('//da189i1jfloii.cloudfront.net/js/kinvey-ember-2.0.0-beta.js'); }}
            
        
        @yield('footer')
        
        <script>
        var App = Ember.Application.create();
        App.Router.map(function() {
            this.resource("index", {path: '/'}, function(){
                this.route('post', {path: '/:post_id'});
            });
            
            
        });
        
        @yield('js')
        </script>
        {{ HTML::script('js/app.js'); }}
    </body>
</html>