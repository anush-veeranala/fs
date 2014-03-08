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
}