{{Form::open(array('route' => "sessions.store"))}}

{{Form::label('email', "Email: ")}}
{{Form::email('email', '', array(
  'placeholder' => 'Email',
  'required' => true))}}

{{Form::label('password', "Password: ")}}
{{Form::password('password')}}

<p>
  {{Form::submit('Login')}}
</p>


{{Form::close()}}
