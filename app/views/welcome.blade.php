<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    {{ HTML::style('css/styles.css') }}
</head>
<body>
    <img class="welcome-banner" src="img/welcome.jpg" />
    
    
    
    <a class="join-btn" href="{{ URL::route('auth') }}">
        <img src="img/get_started_btn.gif" />
    </a>
    
    
</body>
</html>