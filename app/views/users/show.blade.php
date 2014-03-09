<div>
  {{Form::open(array(
      'route' => "messages.store",
      'method' => 'post',
      'id' => 'message-form'))}}

  {{Form::label('content', "Message: ")}}
  {{Form::textarea('content', '', array(
      'placeholder' => 'Message...(max length: 200 chars)',
      'maxlength' => 200,
      'required' => true))}}
  <p>
    {{Form::submit('Broadcast')}}
  </p>


  {{Form::close()}}
</div>
<li>
  {{ Form::open(array('route' => 'sessions.destroy', 'method' => 'delete')) }}
  {{ Form::submit('Logout') }}
  {{ Form::close() }}
</li>


<p>Welcome {{ Auth::user()->email}}</p>
