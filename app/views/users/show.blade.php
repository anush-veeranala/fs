<div class="hide" id="message-form-popup">
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
<ul id="sidebar">
  <li id="message-form-show">Broadcast Message</li>
  <li>Saved Messages</li>
  <li>
    {{ Form::open(array('route' => 'sessions.destroy', 'method' => 'delete')) }}
    {{ Form::submit('Logout') }}
    {{ Form::close() }}
  </li>
</ul>

<div class="message-overlay">
<div class="messages">

  @foreach($messages as $message)
    <div class="message">
      {{ HTML::image('user.png')}}
      <div class="message-content">
        {{$message->content}}
      </div>
    </div>
  @endforeach

</div>
</div>


<p>Welcome {{ Auth::user()->email}}</p>