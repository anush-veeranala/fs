<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta author="Anush Veeranala">

    <title>The Resistance</title>
  </head>

  <body>

    <div class="container">
      @if(Session::has('message'))
        <p> {{ Session::get('message') }} </p>
      @endif
      {{ $content}}
    </div>
  </body>
</html>
