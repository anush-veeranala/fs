{{ Form::open(array(
    'route' => 'favourites.store',
    'method' => 'post',
    'class' => 'add-favourite'
  )) }}
{{ Form::hidden('message_id', $message->id) }}
{{ Form::submit('Save Message') }}
{{ Form::close() }}
