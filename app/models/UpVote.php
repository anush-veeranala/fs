<?php

class UpVote extends Eloquent{

    public function message()
    {
        return $this->belongsTo('Message');
    }
    public function user()
    {
        return $this->belongsTo('User');
    }
    public static function validate($input) {

        $rules = array(
            'user_id' => 'required|integer|exists:users,id',
            'message_id' => 'required|integer|exists:messages,id'
        );
        return Validator::make($input, $rules);
    }
    public static function user_upvote($message_id){
        return UpVote::where('message_id', $message_id)->where('user_id', Auth::user()->id)->first();
    }
    public static function upvote_count($message_id){
        return UpVote::where('message_id', $message_id)->count();
    }

}