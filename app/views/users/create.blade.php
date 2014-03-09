{{Form::open(array('route' => "users.store"))}}

<ul>
  @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
</ul>

{{Form::label('name', "Name: ")}}
{{Form::text('name')}}

{{Form::label('email', "Email: ")}}
{{Form::text('email')}}

{{Form::label('password', "Password: ")}}
{{Form::password('password')}}

{{Form::label('password_confirmation', "Password Confirmation: ")}}
{{Form::password('password_confirmation')}}

<p>
  {{Form::submit('Register')}}
</p>


{{Form::close()}}
