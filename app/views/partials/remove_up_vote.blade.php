{{ Form::open(array('route' => 'up_votes.destroy',
                    'method' => 'delete',
                    'class' => 'remove-up-vote')) }}
{{ Form::hidden('up_vote_id', $up_vote->id) }}
{{ Form::submit('UP VOTED') }}
{{ Form::close() }}
