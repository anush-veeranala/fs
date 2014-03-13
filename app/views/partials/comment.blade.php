<div class="comment">
  <input type="hidden" name="message_id" value={{$comment->message->id}}>
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
