@foreach($messages as $message)
  {{ View::make('partials.message')->with('message', $message) }}
@endforeach
