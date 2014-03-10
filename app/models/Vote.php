<?php

class Vote extends Eloquent{

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
            'user_id' => 'required|digits|exists:users,id'
            'message_id' => 'required|digits|exists:messages,id'
            'up' => 'Required|in:true,false'
        );
        return Validator::make($input, $rules);
    }
}