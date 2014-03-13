{{ Form::open(array(
    'route' => 'up_votes.store',
    'method' => 'post',
    'class' => 'up-vote'
  )) }}
{{ Form::hidden('message_id', $message->id) }}
{{ Form::submit('Up Vote') }}
{{ Form::close() }}
