<?php

class UsersController extends \BaseController {


    protected $layout = 'layouts.master';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    /* public function index() */
    /* { */
    /*     // */
    /* } */

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->layout->content = View::make("users.create");
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {

        $input = Input::all();

        $v = User::validate($input);

        if($v->passes())
            {
                $user = new User;
                $user->name = Input::get('name');
                $user->email = Input::get('email');
                $user->password = Hash::make(Input::get('password'));
                $user->save();
                return Redirect::to('login')->with('message', 'Thanks for registering! Please login');
            }
        else
            {
                return Redirect::to('signup')->with('message', 'The following errors occurred')->withErrors($v)->withInput();
            }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show()
    {
        $messages = Auth::user()->messages()->get();
        /* $vote_count = Vote::votescount(); */
        /* dd($messages); */
        $this->layout->content = View::make("users.show", array('messages' => $messages ));

        //
    }

    public function saved()
    {
        $messages = Auth::user()->favourites()->get();
        /* $vote_count = Vote::votescount(); */
        /* dd($messages); */
        $this->layout->content = View::make("users.saved", array('messages' => $messages ));

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    /* public function edit($id) */
    /* { */
    /*     // */
    /* } */

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    /* public function update($id) */
    /* { */
    /*     // */
    /* } */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    /* public function destroy($id) */
    /* { */
    /*     // */
    /* } */

}