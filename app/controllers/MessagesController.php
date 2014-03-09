<?php

class MessagesController extends \BaseController {

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
    /* public function create() */
    /* { */
    /*  // */
    /* } */

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        if ( Session::token() !== Input::get( '_token' ) ) {
            return Response::json( array(
                            'msg' => 'Unauthorized attempt to create setting'
            ) );
        }
        $input = Input::all();

        $v = Message::validate($input);

        if($v->passes())
            {
                $message = new Message;
                $message->content = Input::get('content');
                $user = Auth::user();
                $message = $user->messages()->save($message);
                $response = array(
                    'status' => 'success',
                    'msg' => 'Setting created successfully',
                );

                return Response::json( $response );
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    /* public function show($id) */
    /* { */
    /*     // */
    /* } */

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