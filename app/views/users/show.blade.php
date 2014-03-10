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




<div class="message-overlay">
  <div class="messages">

    @foreach($messages as $message)


      @if ($message->user->admin)
      @endif


      <div class="message">
        {{ HTML::image('user.png')}}
        {{ $message->user->name }}
        {{ $message->created_at }}
        <div class="message-content">
          {{$message->content}}
        </div>


        @if ($up_vote = DB::table('up_votes')->where('message_id', $message->id)->where('user_id', Auth::user()->id)->first())
        @endif

        @if ($up_vote === NULL)

          {{ Form::open(array(
              'route' => 'up_votes.store',
              'method' => 'post',
              'class' => 'up-vote'
            )) }}
          {{ Form::hidden('message_id', $message->id) }}
          {{ Form::submit('Up Vote') }}
          {{ Form::close() }}

        @else

          {{ Form::open(array('route' => array('up_votes.destroy', $up_vote->id),
                              'method' => 'delete',
                              'class' => 'remove-up-vote')) }}
          {{ Form::hidden('up_vote_id', $up_vote->id) }}
          <!-- here -->
          {{ Form::submit('UP VOTED') }}
          {{ Form::close() }}

        @endif
        <span> {{ UpVote::where('message_id', $message->id)->count() }} </span>


        @if ($down_vote = DB::table('down_votes')->where('message_id', $message->id)->where('user_id', Auth::user()->id)->first())
        @endif

        @if ($down_vote === NULL)

          {{ Form::open(array(
              'route' => 'down_votes.store',
              'method' => 'post',
              'class' => 'down-vote'
            )) }}
          {{ Form::hidden('message_id', $message->id) }}
          {{ Form::submit('Down Vote') }}
          {{ Form::close() }}

        @else

          {{ Form::open(array('route' => array('down_votes.destroy', $down_vote->id),
                              'method' => 'delete',
                              'class' => 'remove-down-vote')) }}
          {{ Form::hidden('down_vote_id', $down_vote->id) }}
          <!-- here -->
          {{ Form::submit('DOWN VOTED') }}
          {{ Form::close() }}

        @endif
        <span> {{ DownVote::where('message_id', $message->id)->count() }} </span>


        @if ($saved = DB::table('favourites')->where('message_id', $message->id)->where('user_id', Auth::user()->id)->first())
        @endif

        @if ($saved === NULL)

          {{ Form::open(array(
              'route' => 'favourites.store',
              'method' => 'post',
              'class' => 'add-favourite'
            )) }}
          {{ Form::hidden('message_id', $message->id) }}
          {{ Form::submit('Save Message') }}
          {{ Form::close() }}

        @else

          {{ Form::open(array('route' => array('favourites.destroy', $saved->id),
                              'method' => 'delete',
                              'class' => 'remove-favourite')) }}
          {{ Form::hidden('favourite_id', $saved->id) }}
          <!-- here -->
          {{ Form::submit('Remove from saved') }}
          {{ Form::close() }}

        @endif


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
        {{ Form::close() }}


        @foreach($message->comments as $comment)
          {{ $comment->user->name}}
          {{ $comment->created_at}}
          {{ $comment->content }}
        @endforeach

      </div>
    @endforeach
  </div>
</div>
