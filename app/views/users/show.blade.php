<div class="hide" id="message-form-popup">
  {{Form::open(array(
      'route' => "messages.store",
      'method' => 'post',
      'id' => 'message-form'))}}

  {{Form::label('content', "Message: ")}}
  {{Form::textarea('content', '', array(
      'placeholder' => 'Message...(max length: 200 chars)',
      'maxlength' => 200,
      'required' => true,
      'id' => 'content'))}}
  {{Form::submit('Broadcast')}}

  {{Form::close()}}
</div>

<ul id="sidebar">
  <li id="message-form-show">Broadcast Message</li>
  <li> {{ HTML::link('users/saved', 'Saved Messages') }} </li>
  <li>
    {{ Form::open(array('route' => 'sessions.destroy', 'method' => 'delete')) }}
    {{ Form::submit('Logout') }}
    {{ Form::close() }}
  </li>
</ul>

<div class="messages-overlay">
  <div class="messages">
    @foreach($messages as $message)
      <!-- here -->
      {{ View::make('partials.message')->with('message', $message) }}
      <!-- to here -->
    @endforeach
  </div>
</div>
