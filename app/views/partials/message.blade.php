<div class="message">
      <div class="profile-pic
           @if ($message->user->admin)
           admin-profile
           @endif
           ">
        {{ HTML::image('user.png')}}
      </div>
      <div class="message-body">
        <div class="id-time">
          <span class="name">
            {{ $message->user->name }}
          </span>
          @if ($message->user->admin)
            <span class="status">Resistance Leader</span>
          @endif
          <span class="timeofcomment">
            {{ $message->created_at }}
          </span>
        </div>
        <div class="message-text">
          {{$message->content}}
        </div>
        <div class="upvotes-comments">
          @if (!($message->user->admin))
            @if ($up_vote = UpVote::user_upvote($message->id))
            @endif
            <span class="upvote-count"> {{ UpVote::upvote_count($message->id) }} </span>
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
              {{ Form::open(array('route' => 'up_votes.destroy',
                                  'method' => 'delete',
                                  'class' => 'remove-up-vote')) }}
              {{ Form::hidden('up_vote_id', $up_vote->id) }}
              {{ Form::submit('UP VOTED') }}
              {{ Form::close() }}
            @endif
            @if ($down_vote = DownVote::user_downvote($message->id))
            @endif
            <span class="downvote-count"> {{ DownVote::downvote_count($message->id) }} </span>
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
              {{ Form::open(array('route' => 'down_votes.destroy',
                                  'method' => 'delete',
                                  'class' => 'remove-down-vote')) }}
              {{ Form::hidden('down_vote_id', $down_vote->id) }}
              {{ Form::submit('DOWN VOTED') }}
              {{ Form::close() }}
            @endif
          @endif
          @if ($saved = Favourite::user_favourite($message->id))
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
            {{ Form::open(array('route' => 'favourites.destroy',
                                'method' => 'delete',
                                'class' => 'remove-favourite')) }}
            {{ Form::hidden('favourite_id', $saved->id) }}
            <!-- here -->
            {{ Form::submit('Remove from saved') }}
            {{ Form::close() }}
          @endif
          <span class="add-comment">Add Comment</span>
          <span class="hide-comment">Hide Comments</span>
          <div></div>
        </div>
      </div>
</div>
 <!-- {{Form::open(array(
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
 -->
@foreach($message->comments as $comment)
<div class="comment">
  <div class="profile-pic">
    {{ HTML::image('user.png')}}
  </div>
  <div class="comment-body">
    <div class="id-time">
      <span class="name">{{ $comment->user->name}}</span>
      <span class="timeofcomment">
        {{ $comment->created_at}}
      </span>
    </div>
    <div class="comment-text">
      {{ $comment->content }}
    </div>
  </div>
</div>
@endforeach
<div style="clear:both"/>
