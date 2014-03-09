<?php

class SessionsController extends \BaseController {

    protected $layout = 'layouts.master';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    /* public function index() */
    /* { */
    /*  // */
    /* } */

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $this->layout->content = View::make("sessions.create");
        /* return View::make("sessions.create"); */
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

        $attempt = Auth::attempt([
            'email' => $input['email'],
            'password' => $input['password']
        ]);
        if($attempt)
            {
                return Redirect::intended('users.show');
            }
        else
            {
                return Redirect::route('login')
                    ->with('message', 'Incorrect Credentials!');
            }
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}