jQuery( document ).ready( function( $ ) {

    $( '#message-form' ).on( 'submit', function() {


        //.....
        //show some spinner etc to indicate operation in progress
        //.....
        triggers.eq(0).overlay().close();
        $.post(
            $( this ).prop( 'action' ),
            {
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "content": $( '#content' ).val()
                // "setting_value": $( '#setting_value' ).val()
            },
            function( data ) {
                //do something with data/response returned by server
            },
            'json'
        );
        //.....
        //do anything else you might want to do
        //.....

        //prevent the form from actually submitting in browser
        // alert("came here");
        // return false;
        return defaultPrevented();
        // return e.preventDefault();

    } );

    $( '.up-vote' ).on( 'submit', function() {

        //.....
        //show some spinner etc to indicate operation in progress
        //.....

        $.post(
            $( this ).prop( 'action' ),
            {
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "message_id": $( this).find( 'input[name=message_id]' ).val()
                // "setting_value": $( '#setting_value' ).val()
            },
            function( data ) {
                //do something with data/response returned by server
            },
            'json'
        );

        //.....
        //do anything else you might want to do
        //.....

        //prevent the form from actually submitting in browser
        return false;
    } );

    $( '.remove-up-vote' ).on( 'submit', function() {

        //.....
        //show some spinner etc to indicate operation in progress
        //.....

        $.ajax({
            url: $( this ).prop( 'action' ),
            type: "DELETE",
            data: {
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "up_vote_id": $( this).find( 'input[name=up_vote_id]' ).val()
                // "setting_value": $( '#setting_value' ).val()
            },
            success: function(result) {
                // Do something with the result
            }
        });

        // $.post(
        //     $( this ).prop( 'action' ),
        //     {
        //         "_token": $( this ).find( 'input[name=_token]' ).val(),
        //         "up_vote_id": $( this).find( 'input[name=up_vote_id]' ).val()
        //         // "setting_value": $( '#setting_value' ).val()
        //     },
        //     function( data ) {
        //         //do something with data/response returned by server
        //     },
        //     'json'
        // );

        //.....
        //do anything else you might want to do
        //.....

        //prevent the form from actually submitting in browser
        return false;
    } );

    $( '.down-vote' ).on( 'submit', function() {

        //.....
        //show some spinner etc to indicate operation in progress
        //.....

        $.post(
            $( this ).prop( 'action' ),
            {
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "message_id": $( this).find( 'input[name=message_id]' ).val()
                // "setting_value": $( '#setting_value' ).val()
            },
            function( data ) {
                //do something with data/response returned by server
            },
            'json'
        );

        //.....
        //do anything else you might want to do
        //.....

        //prevent the form from actually submitting in browser
        return false;
    } );

    $( '.remove-down-vote' ).on( 'submit', function() {

        //.....
        //show some spinner etc to indicate operation in progress
        //.....

        $.ajax({
            url: $( this ).prop( 'action' ),
            type: "DELETE",
            data: {
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "down_vote_id": $( this).find( 'input[name=down_vote_id]' ).val()
                // "setting_value": $( '#setting_value' ).val()
            },
            success: function(result) {
                // Do something with the result
            }
        });


        //.....
        //do anything else you might want to do
        //.....

        //prevent the form from actually submitting in browser
        return false;
    } );

    $( '.add-favourite' ).on( 'submit', function() {

        //.....
        //show some spinner etc to indicate operation in progress
        //.....

        $.post(
            $( this ).prop( 'action' ),
            {
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "message_id": $( this).find( 'input[name=message_id]' ).val()
                // "setting_value": $( '#setting_value' ).val()
            },
            function( data ) {
                //do something with data/response returned by server
            },
            'json'
        );

        //.....
        //do anything else you might want to do
        //.....

        //prevent the form from actually submitting in browser
        return false;
    } );

    $( '.remove-favourite' ).on( 'submit', function() {

        //.....
        //show some spinner etc to indicate operation in progress
        //.....

        $.ajax({
            url: $( this ).prop( 'action' ),
            type: "DELETE",
            data: {
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "favourite_id": $( this).find( 'input[name=favourite_id]' ).val()
                // "setting_value": $( '#setting_value' ).val()
            },
            success: function(result) {
                // Do something with the result
            }
        });


        //.....
        //do anything else you might want to do
        //.....

        //prevent the form from actually submitting in browser
        return false;
    } );



} );

var All = {



    // longpoll: function waitForMsg() {
    //     /* This requests the url "msgsrv.php"
    //        When it complete (or errors)*/
    //     $.ajax({
    //         type: "GET",
    //         url: "/messages/checkin_poll",

    //         async: true, /* If set to non-async, browser shows page as "Loading.."*/
    //         cache: false,
    //         timeout:50000, /* Timeout in ms */

    //         success: function(data){ /* called when request to barge.php completes */
    //             addmsg("new", data); /* Add response to a .msg div (with the "new" class)*/
    //             setTimeout(
    //                 waitForMsg, /* Request next message */
    //                 1000 /* ..after 1 seconds */
    //             );
    //         },
    //         error: function(XMLHttpRequest, textStatus, errorThrown){
    //             addmsg("error", textStatus + " (" + errorThrown + ")");
    //             setTimeout(
    //                 waitForMsg, /* Try again after.. */
    //                 15000); /* milliseconds (15seconds) */
    //         }
    //     });

    // },


    // newmessagepopup: function(){
    //     $("#message-form-popup").show();
    // },
    initialize: function(){
        // $(document).on("click", "#message-form-show", All.newmessagepopup);
        // All.longpoll();
        $('#close').on('click',function(e){
            triggers.eq(0).overlay().close();
        });
        $('.close').on('click',function(e){
            var $elem = $(this);
            $elem.parent().parent().find('.add-comment').overlay().close();
        });

        var triggers = $('#message-form-show').overlay({
            mask: {
                color: '#ccc',
                top: 100
            },
            closeOnClick:false
        });
        $('.add-comment').overlay({
            mask: {
                color: '#ccc',
                top: 100
            },
            closeOnClick: false
        });
        $('.add-comment-form').on('submit',function(e){
            var $elem = $(this).parent().parent().find('.add-comment');
            $elem.overlay().close();
            $.post(
                $(this).prop('action'),$(this).serialize(), function(data) {

                }
            );
            return e.preventDefault();
        });

    }

}


init = function(){
    All.initialize();
}

$(document).ready(init);

var conn = new ab.Session(
    'ws://localhost:8080' // The host (our Ratchet WebSocket server) to connect to
    , function() {            // Once the connection has been established
        conn.subscribe('resistance', function(topic, data) {
            // This is where you would add the new article to the DOM (beyond the scope of this tutorial)

            console.log('New article published to category "' + topic + '" : ' + data);
        });
    }
    , function() {            // When the connection is closed
        console.warn('WebSocket connection closed');
    }
    , {                       // Additional parameters, we're ignoring the WAMP sub-protocol for older browsers
        'skipSubprotocolCheck': true
    }
);
