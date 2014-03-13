<?php

class MessagesController extends \BaseController {

    /* public function get_checkin_poll() */
    /* { */
    /*     session_write_close(); */
    /*     session_start(); */
    /*     MessagesController::longpoll(); */

    /*     return View::make('partials.messages')->with('messages', $messages); */

    /*     /\* $new = Message::where() *\/ */
    /*     /\* return Response::json($json); *\/ */
    /* } */

    /* public static function longpoll() */
    /* { */
    /*     $time = date('Y-m-d H:i:s',time()); */
    /*     while(1) */
    /*         { */
    /*             $messages = Message::where('created_at','>','time()')->get(); */

    /*             if ($messages->isEmpty()) */
    /*                 { */
    /*                     sleep(10); */
    /*                     dd("here"); */

    /*                 } */
    /*             else */
    /*                 { */
    /*                     break; */
    /*                 } */
    /*         } */

    /*     return $messages; */
    /* } */


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

        $v = Message::validate($input);

        if($v->passes())
            {
                $message = new Message;
                $message->content = Input::get('content');
                $message->user()->associate($user);
                if ($message->save()){
                    /* $response = array( */
                    /*     'status' => 'success', */
                    /*     'msg' => 'Message Broadcasted.' */
                    /* ); */
                    // This is our new stuff
                    $response_broadcast = View::make('partials.message')->with('message', $message);
                    $context = new ZMQContext();
                    $socket = $context->getSocket(ZMQ::SOCKET_PUSH, 'my pusher');
                    $socket->connect("tcp://localhost:5555");

                    $socket->send($response_broadcast);
                    /* $socket->send(json_encode($message->toJson())); */
                    return $response_broadcast;
                    /* return $response; */
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