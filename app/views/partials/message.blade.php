<div class="message"
     @if ($message->user->admin)
     "admin-message"
     @endif
     >
     {{ HTML::image('user.png') }}
     {{ $message->user->name }}
     @if ($message->user->admin)
       Resistance Leader
     @endif
     {{ $message->created_at }}
     {{ $message->content }}
     @if (!($message->user->admin))
       @if ($up_vote = UpVote::user_upvote($message->id))
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

         {{ Form::open(array('route' => 'up_votes.destroy',
                             'method' => 'delete',
                             'class' => 'remove-up-vote')) }}
         {{ Form::hidden('up_vote_id', $up_vote->id) }}
         {{ Form::submit('UP VOTED') }}
         {{ Form::close() }}

       @endif
       <span> {{ UpVote::upvote_count($message->id) }} </span>

       @if ($down_vote = DownVote::user_downvote($message->id))
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

         {{ Form::open(array('route' => 'down_votes.destroy',
                             'method' => 'delete',
                             'class' => 'remove-down-vote')) }}
         {{ Form::hidden('down_vote_id', $down_vote->id) }}
         {{ Form::submit('DOWN VOTED') }}
         {{ Form::close() }}

       @endif
       <span> {{ DownVote::downvote_count($message->id) }} </span>
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
