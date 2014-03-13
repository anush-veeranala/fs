<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta author="Anush Veeranala">

    <title>The Resistance</title>
    {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}
    {{ HTML::script('http://autobahn.s3.amazonaws.com/js/autobahn.min.js') }}
    {{ HTML::script('js/jquery.tools.min.js') }}
    {{ HTML::style('css/main.css') }}
    {{ HTML::script('js/main.js') }}
  </head>

  <body>
    <div>
         <ul id="navbar">
           <li><h1>THE RESISTANCE</h1></li>
           @if(!Auth::check())
             <li>{{ HTML::link('signup', 'SignUp') }}</li>
             <li>{{ HTML::link('login', 'Login') }}</li>
           @else
             <li>{{ HTML::link('users/show', 'Home') }}</li>
           @endif
         </ul>
    </div>

    <div>
      @if(Session::has('message'))
        <p class="notif"> {{ Session::get('message') }} </p>
      @endif
      {{ $content}}
    </div>
    <div class="error">
    </div>
  </body>
</html>
