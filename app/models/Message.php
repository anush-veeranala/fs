<?php

class Message extends Eloquent {

    public function comments()
    {
        return $this->hasMany('Comment');
    }
    public function user()
    {
        return $this->belongsTo('User');
    }

    public static function validate($input) {

        $rules = array(
            'user_id' => 'required|digits|exists:users,id'
            'content' => 'Required|size:200'
        );
        return Validator::make($input, $rules);
    }

}