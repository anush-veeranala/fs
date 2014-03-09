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
            'content' => 'Required'
        );
        return Validator::make($input, $rules);
    }

}