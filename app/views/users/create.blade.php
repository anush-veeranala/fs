{{Form::open(array('route' => "users.store"))}}

{{Form::label('name', "Name: ")}}
{{Form::text('name')}}

{{Form::label('email', "Email: ")}}
{{Form::text('email')}}

{{Form::label('password', "Password: ")}}
{{Form::password('password')}}

<p>
  {{Form::submit('Login')}}
</p>


{{Form::close()}}
