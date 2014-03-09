jQuery( document ).ready( function( $ ) {

    $( '#message-form' ).on( 'submit', function() {

        //.....
        //show some spinner etc to indicate operation in progress
        //.....

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
        return false;
    } );

} );
