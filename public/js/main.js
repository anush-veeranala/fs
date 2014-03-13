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

                $( document ).on('click', '.close' ,function(e){
                        var $elem = $(this);
                        $elem.parent().parent().find('.add-comment').overlay().close();
                });

                $('.add-comment').overlay({
                        mask: {
                                color: '#ccc',
                                top: 100
                        },
                        closeOnClick: false
                });
                $(document).on('submit', '.add-comment-form' ,function(e){
                        var $elem = $(this).parent().parent().find('.add-comment');
                        var $parent = $(this).parent().parent();
                        $elem.overlay().close();
                        var val = $(this).find('textarea').val();
                        $.post(
                                $(this).prop('action'),$(this).serialize(), function(data) {
                                                //$parent.append(createComment(val,data.msg.date));
                                }
                        );
                    $(this).find('textarea').val('');
                        return e.preventDefault();
                });

        }

}


init = function(){
        All.initialize();
}

$(document).ready(init);

jQuery( document ).ready( function( $ ) {
        var triggers = $('#message-form-show').overlay({
                mask: {
                        color: '#ccc',
                        top: 100
                },
                closeOnClick:false
        });
        $('#close').on('click',function(e){
                triggers.eq(0).overlay().close();
        });

        $( '#message-form' ).on( 'submit', function(e) {


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
                                // $("div.messages").prepend(data);
                                //do something with data/response returned by server
                        },
                        'html'
                );
               $( '#content' ).val('');
                //.....
                //do anything else you might want to do
                //.....

                //prevent the form from actually submitting in browser
                // alert("came here");
                // return false;
                // return defaultPrevented();
                return e.preventDefault();

        } );

        $( document ).on( 'submit','.up-vote', function() {

                //.....
                //show some spinner etc to indicate operation in progress
                //.....
                var form = $(this);
                var upvoteCount = $($(this).siblings("span.upvote-count")[0]);
                $.post(
                        $( this ).prop( 'action' ),
                        {
                                "_token": $( this ).find( 'input[name=_token]' ).val(),
                                "message_id": $( this).find( 'input[name=message_id]' ).val()
                                // "setting_value": $( '#setting_value' ).val()
                        },
                        function( data ) {
                                form.replaceWith(data);
                                upvoteCount.text(parseInt(upvoteCount.text()) + 1);
                                //do something with data/response returned by server
                        },
                        'html'
                );

                //.....
                //do anything else you might want to do
                //.....

                //prevent the form from actually submitting in browser
                return false;
        } );

        $( document ).on( 'submit', '.remove-up-vote' ,function() {

                //.....
                //show some spinner etc to indicate operation in progress
                //.....
                var form = $(this);
                var upvoteCount = $($(this).siblings("span.upvote-count")[0]);
                $.ajax({
                        url: $( this ).prop( 'action' ),
                        type: "DELETE",
                        data: {
                                "_token": $( this ).find( 'input[name=_token]' ).val(),
                                "up_vote_id": $( this).find( 'input[name=up_vote_id]' ).val()
                                // "setting_value": $( '#setting_value' ).val()
                        },
                        success: function(result) {
                                form.replaceWith(result);
                                upvoteCount.text(parseInt(upvoteCount.text()) - 1);
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

        $( document ).on( 'submit', '.down-vote' ,function() {

                //.....
                //show some spinner etc to indicate operation in progress
                //.....
                var form = $(this);
                var downvoteCount = $($(this).siblings("span.downvote-count")[0]);
                $.post(
                        $( this ).prop( 'action' ),
                        {
                                "_token": $( this ).find( 'input[name=_token]' ).val(),
                                "message_id": $( this).find( 'input[name=message_id]' ).val()
                                // "setting_value": $( '#setting_value' ).val()
                        },
                        function( data ) {
                                form.replaceWith(data);
                                downvoteCount.text(parseInt(downvoteCount.text()) + 1);
                                //do something with data/response returned by server
                        },
                        'html'
                );

                //.....
                //do anything else you might want to do
                //.....

                //prevent the form from actually submitting in browser
                return false;
        } );

        $( document ).on( 'submit', '.remove-down-vote' ,function() {

                //.....
                //show some spinner etc to indicate operation in progress
                //.....
                var form = $(this);
                var downvoteCount = $($(this).siblings("span.downvote-count")[0]);
                $.ajax({
                        url: $( this ).prop( 'action' ),
                        type: "DELETE",
                        data: {
                                "_token": $( this ).find( 'input[name=_token]' ).val(),
                                "down_vote_id": $( this).find( 'input[name=down_vote_id]' ).val()
                                // "setting_value": $( '#setting_value' ).val()
                        },
                        success: function(result) {
                                form.replaceWith(result);
                                downvoteCount.text(parseInt(downvoteCount.text()) - 1);
                                // Do something with the result
                        }
                });


                //.....
                //do anything else you might want to do
                //.....

                //prevent the form from actually submitting in browser
                return false;
        } );

        $( document ).on( 'submit', '.add-favourite' ,function() {

                //.....
                //show some spinner etc to indicate operation in progress
                //.....
                var form = $(this);
                $.post(
                        $( this ).prop( 'action' ),
                        {
                                "_token": $( this ).find( 'input[name=_token]' ).val(),
                                "message_id": $( this).find( 'input[name=message_id]' ).val()
                                // "setting_value": $( '#setting_value' ).val()
                        },
                        function( data ) {
                                form.replaceWith(data);
                                //do something with data/response returned by server
                        },
                        'html'
                );

                //.....
                //do anything else you might want to do
                //.....

                //prevent the form from actually submitting in browser
                return false;
        } );

        $( document ).on( 'submit', '.remove-favourite' , function() {

                //.....
                //show some spinner etc to indicate operation in progress
                //.....
                var form = $(this);
                $.ajax({
                        url: $( this ).prop( 'action' ),
                        type: "DELETE",
                        data: {
                                "_token": $( this ).find( 'input[name=_token]' ).val(),
                                "favourite_id": $( this).find( 'input[name=favourite_id]' ).val()
                                // "setting_value": $( '#setting_value' ).val()
                        },
                        success: function(result) {
                                form.replaceWith(result);
                                // alert(result);
                                // Do something with the result
                        }
                });


                //.....
                //do anything else you might want to do
                //.....

                //prevent the form from actually submitting in browser
                return false;
        } );


        $( document ).on( 'click', 'span.hide-show-comment' ,function(){
                if ($(this).text()=="Hide Comments") {
                        $(this).parents("div.message").siblings("div.comment").hide();
                        $(this).text("Show Comments");
                }
                else{
                        $(this).parents("div.message").siblings("div.comment").show();
                        $(this).text("Hide Comments");
                };
        } );



} );


var conn = new ab.Session(
        'ws://localhost:8080' // The host (our Ratchet WebSocket server) to connect to
        , function() {            // Once the connection has been established
                conn.subscribe('resistance', function(topic, data) {
                        // This is where you would add the new article to the DOM (beyond the scope of this tutorial)
                        var newData = $('<div/>').html(data).contents();
                        if (newData.hasClass("comment")) {
                                $("#"+newData.children("input").val()).parent().append(newData);
                        }
                        else if(newData.hasClass("whole-message")){
                                $("div.messages").prepend($(data));
                                $('.add-comment').overlay({
                                        mask: {
                                        color: '#ccc',
                                        top: 100
                                },
                                closeOnClick: false
                        });
                        };
                        //console.log('New article published to category "' + topic + '" : ' + data);
                });
        }
        , function() {            // When the connection is closed
                console.warn('WebSocket connection closed');
        }
        , {                       // Additional parameters, we're ignoring the WAMP sub-protocol for older browsers
                'skipSubprotocolCheck': true
        }
);
