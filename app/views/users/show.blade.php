<li>
  {{ Form::open(array('route' => 'sessions.destroy', 'method' => 'delete')) }}
  {{ Form::submit('Logout') }}
  {{ Form::close() }}
</li>


<p>Welcome {{ Auth::user()->email}}</p>
