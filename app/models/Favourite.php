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
            'user_id' => 'required|integers|exists:users,id',
            'message_id' => 'required|integers|exists:messages,id'
        );
        return Validator::make($input, $rules);
    }
}