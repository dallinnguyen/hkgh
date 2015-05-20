@extends('layout.base')

@section('head')
    
    @stop
@section('content')
       
       <script type="text/x-handlebars">
            @{{outlet}}
        </script>
        <script type="text/x-handlebars" data-template-name="Chatroom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Laravel 4 Chatdfdfd</h1>
                        <table>
                            @{{#each message in model}}
                                <tr>
                                    <td>
                                        @{{message.user_name}} :
                                    </td>
                                    <td>
                                        @{{message.message}}
                                    </td>
                                </tr>
                            @{{/each}}
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input-group">
                            @{{input type="text" value=command class="form-control"}}
                            <span class="input-group-btn">
                                <button class="btn btn-default" @{{action "send"}}>Send</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </script> 
        
@stop

@section('footer')
        {{ HTML::script('js/libs/jquery-1.9.0.js'); }}
        {{ HTML::script('js/libs/bootstrap.min.js'); }}
        {{ HTML::script('js/libs/handlebars-v1.3.0.js'); }}
        
        {{ HTML::script('js/libs/ember.min.js'); }}
        {{ HTML::script('js/libs/ember-data.min.js'); }}
        
        {{ HTML::script('js/shared.js'); }}
    @stop
