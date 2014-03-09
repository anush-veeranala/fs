<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta author="Anush Veeranala">

    <title>The Resistance</title>
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
        <p> {{ Session::get('message') }} </p>
      @endif
      {{ $content}}
    </div>
  </body>
</html>
