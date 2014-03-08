<?php

class Comment extends Eloquent{

    public function message()
    {
        return $this->belongsTo('Message');
    }
}