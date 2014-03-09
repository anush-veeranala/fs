<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta author="Anush Veeranala">

    <title>The Resistance</title>

    {{ HTML::style('css/main.css') }}
    {{ HTML::style('js/main.js') }}

  </head>

  <body>
    <div>
         <ul>
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
