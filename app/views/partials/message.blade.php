<div class="whole-message">
  <div class="message {{$message->id}}  ">
    <div class="profile-pic
         @if ($message->user->admin)
         admin-profile
         @endif
         ">
         {{ HTML::image('user.png')}}
    </div>
    <div class="message-body @if ($message->user->admin)
      admin-profile
      @endif
      ">
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
            <?php
            $data['message'] = $message;
            echo View::make('partials.up_vote', $data);
            ?>
          @else
            <?php
            $data['up_vote'] = $up_vote;
            echo View::make('partials.remove_up_vote', $data);
            ?>
          @endif
          @if ($down_vote = DownVote::user_downvote($message->id))
          @endif
          <span class="downvote-count"> {{ DownVote::downvote_count($message->id) }} </span>
          @if ($down_vote === NULL)
            <?php
            $data['message'] = $message;
            echo View::make('partials.down_vote', $data);
            ?>
          @else
            <?php
            $data['down_vote'] = $down_vote;
            echo View::make('partials.remove_down_vote', $data);
            ?>
          @endif
        @endif
        @if ($saved = Favourite::user_favourite($message->id))
        @endif
        @if ($saved === NULL)
          <?php
          $data['message'] = $message;
          echo View::make('partials.save_message', $data);
          ?>
        @else
          <?php
          $data['saved'] = $saved;
          echo View::make('partials.remove_saved_message', $data);
          ?>
        @endif
        <span class="add-comment" rel="#{{$message->id}}">Add Comment</span>
        <span class="hide-show-comment">Hide Comments</span>
        <div></div>
      </div>
    </div>
  </div>
  <div id="{{$message->id}}" class ="add-comment-form-div hide">
    <a class="close">X</a>

    {{Form::open(array(
        'route' => "comments.store",
        'method' => 'post','class' => 'add-comment-form'))}}
    {{Form::label('content', "Comment: ")}}
    {{Form::textarea('content', '', array(
        'placeholder' => 'Message...(max length: 200 chars)',
        'maxlength' => 200,
        'required' => true))}}
    {{Form::hidden('message_id', $message->id)}}
    {{Form::submit('Comment')}}
    {{ Form::close() }}
  </div>
  @foreach($message->comments as $comment)
    <?php
    $data['comment'] = $comment;
    echo View::make('partials.comment', $data);
    ?>
  @endforeach
</div>
<div style="clear:both">
</div>
