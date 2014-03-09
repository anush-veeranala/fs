<?php

class UsersController extends \BaseController {


    protected $layout = 'layouts.master';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

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



        /* { */
        /*     $s = $this->user->create(Input::all()); */

        /*     if($s->isSaved()) */
        /*         { */
        /*             return Redirect::route('users.index') */
        /*                 ->with('flash', 'The new user has been created'); */
        /*         } */

        /*     return Redirect::route('register.index') */
        /*         ->withInput() */
        /*         ->withErrors($s->errors()); */
        /* } */
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