{{ Form::open(array('route' => 'favourites.destroy',
                    'method' => 'delete',
                    'class' => 'remove-favourite')) }}
{{ Form::hidden('favourite_id', $saved->id) }}
<!-- here -->
{{ Form::submit('Remove from saved') }}
{{ Form::close() }}
