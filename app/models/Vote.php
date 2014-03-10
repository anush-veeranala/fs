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
            'message_id' => 'required|integers|exists:messages,id',
            'up' => 'required|in:true,false'
        );
        return Validator::make($input, $rules);
    }

    public static function votescount(){

        $counts = DB::table('votes')
            ->groupBy('message_id', 'up')
            ->select(DB::raw('count(*) as user_count, message_id, up' ))
            ->get();
        return $counts;
    }


}