{{Form::open(array('route' => "users.store",
                   'method' => 'post'))}}

<ul class="error">
  @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
</ul>

{{Form::label('name', "Name: ")}}
{{Form::text('name', '', array(
  'placeholder' => 'Name',
  'required' => true))}}

{{Form::label('email', "Email: ")}}
{{Form::email('email', '', array(
  'placeholder' => 'Email',
  'required' => true))}}

{{Form::label('password', "Password: ")}}
{{Form::password('password')}}

{{Form::label('password_confirmation', "Password Confirmation: ")}}
{{Form::password('password_confirmation')}}

<p>
  {{Form::submit('Register')}}
</p>


{{Form::close()}}
