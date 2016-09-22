@extends('layouts.layout')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="col-xs-7">
</div>
<div class="col-xs-4">
<div class="well">
<!-- Open form -->

{!! Form::open(['route' => 'sign_up_store']) !!}

<!-- Input username -->

<!-- {!! Form::label('username', 'Username') !!}
{!! Form::text('input_username') !!}
{!! $errors->first('input_username') !!}  -->

<!-- Input password -->
<!-- {!! Form::label('last_name', 'Last Name') !!}
{!! Form::text('input_last_name') !!}
{!! $errors->first('input_last_name') !!}  -->
<br>
<!-- Input email -->
{!! Form::label('email', 'Email') !!}
{!! Form::email('input_email') !!}
{!! $errors->first('input_email') !!} 

<!-- Input password -->
{!! Form::label('password', 'Password') !!}
{!! Form::password('input_password') !!}
{!! $errors->first('input_password') !!} 
<br>
{!! Form::submit('Sign Up') !!} {!! link_to('user/forgot-password ', 'Forgot your password?') !!} 
{!! Form::close() !!}

<br>

{!! link_to('user/login', 'Login') !!}
<!-- close -->
</div>
</div>
<div class="col-xs-1">
</div>
</div>
</div>
@stop