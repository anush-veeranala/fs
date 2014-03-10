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
  {{Form::submit('Broadcast')}}

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
          {{$message->created_at}}
        </div>

        @if (DB::table('up_votes')->where('message_id', $message->id)->where('user_id', Auth::user()->id)->first() === NULL)
          {
          {{ Form::open(array('route' => 'up_votes.store', 'method' => 'post')) }}
          {{ Form::submit('Up Vote') }}
          {{ Form::close() }}
          }
        @else
          {
          {{ Form::open(array('route' => 'up_votes.destroy', 'method' => 'delete')) }}
          {{ Form::submit('UP VOTED') }}
          {{ Form::close() }}
          }
        @endif




        <span> Save Message </span>
        <span> Add Comment</span>
        <span> Hide Comments</span>

        {{Form::open(array(
            'route' => "comments.store",
            'method' => 'post'))}}

        {{Form::label('content', "Comment: ")}}
        {{Form::textarea('content', '', array(
            'placeholder' => 'Message...(max length: 200 chars)',
            'maxlength' => 200,
            'required' => true))}}
        {{Form::hidden('message_id', $message->id)}}
        {{Form::submit('Comment')}}


      </div>
    @endforeach
  </div>
</div>
