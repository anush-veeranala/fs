<?php

class UpVotesController extends \BaseController {

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
        $user = Auth::user();
        Input::merge(array('user_id' => $user->id));
        $input = Input::all();

        $v = UpVote::validate($input);

        if($v->passes())
            {
                $up_vote = new UpVote;
                $up_vote->user()->associate($user);
                $message = Message::find(Input::get('message_id'));
                $up_vote->message()->associate($message);

                if ($up_vote->save()){
                    $response = View::make('partials.remove_up_vote')->with('up_vote', $up_vote);
                    return $response;
                    /* $response = array( */
                    /*     'status' => 'success', */
                    /*     'msg' => 'Message Broadcasted.' */
                    /* ); */
                }
                else
                    {
                        $response = array(
                            'status' => 'failure',
                            'msg' => 'Something went wrong.Contact Admin'
                        );
                    }

                /* return Response::json( $response ); */
            }
        else
            {
                /* dd($input); */
                /* dd($v->messages()); */
                $response = array(
                    'status' => 'failure',
                    'msg' => 'Wrong Values received'
                );
            }
        return Response::json( $response );
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    /* public function show($id) */
    /* { */
    /*  // */
    /* } */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    /* public function edit($id) */
    /* { */
    /*  // */
    /* } */

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    /* public function update($id) */
    /* { */
    /*  // */
    /* } */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
          /* <button type="submit" href="{{ URL::route('up_votes.destroy', $up_vote->id) }}" class="btn btn-danger btn-mini">Delete</button>button> */
          /* {{ Form::close() }} */


          /* {{ Form::open(array('method' => 'delete', 'action' => array('UpVotesController@destroy', $up_vote->id ))) }} */


    public function destroy()
    {
        if ( Session::token() !== Input::get( '_token' ) ) {
            return Response::json( array(
                'msg' => 'Unauthorized attempt to create setting'
            ) );
        }
        $v = UpVote::find(Input::get('up_vote_id'));
        $message = $v->message;
        $response = View::make('partials.up_vote')->with('message', $message);
        $v->delete();
        return $response;

     //
    }

}