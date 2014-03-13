{{ Form::open(array(
    'route' => 'down_votes.store',
    'method' => 'post',
    'class' => 'down-vote'
  )) }}
{{ Form::hidden('message_id', $message->id) }}
{{ Form::submit('Down Vote') }}
{{ Form::close() }}
