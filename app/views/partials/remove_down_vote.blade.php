{{ Form::open(array('route' => 'down_votes.destroy',
                    'method' => 'delete',
                    'class' => 'remove-down-vote')) }}
{{ Form::hidden('down_vote_id', $down_vote->id) }}
{{ Form::submit('DOWN VOTED') }}
{{ Form::close() }}
