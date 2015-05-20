<!DOCTYPE html>
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
                </div><!--/.nav-collapse -->
            </div>

            <!-- Main component for a primary marketing message or call to action -->
            <div class="">
                <h1>@yield('heading', '')</h1>
                <div>
                    @yield('content')
                </div>
                <!-- <p>
                    <a class="btn btn-lg btn-primary" href="../../components/#navbar">View navbar docs &raquo;</a>
                </p> -->
            </div>
        </div> <!-- /container -->
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
        
        @yield('footer')
        
        
        <script>
        @yield('js')
        </script>
    </body>
</html>