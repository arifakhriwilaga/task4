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
{!! Form::label('username', 'Username') !!}
{!! Form::text('username') !!}
<br>
<br>
<br>
{!! $errors->first('username') !!}
<br>
<br>
<br>
<br>
<!-- Input email -->
{!! Form::label('email', 'Email') !!}
{!! Form::email('email') !!}
{!! $errors->first('email') !!} 
<br>
<!-- Input password -->
{!! Form::label('password', 'Password') !!}
{!! Form::password('password') !!}
{!! $errors->first('password') !!} 
<br>
{!! Form::submit('Sign Up') !!} 
{!! Form::close() !!}
<!-- end form -->
</div>
</div>
<div class="col-xs-1">
</div>
</div>
</div>
@stop