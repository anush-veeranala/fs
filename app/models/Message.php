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
            'user_id' => 'required|integer|exists:users,id',
            'content' => 'required|max:200'
        );
        return Validator::make($input, $rules);
    }

}