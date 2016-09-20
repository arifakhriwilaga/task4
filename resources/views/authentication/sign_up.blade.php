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

<!-- Input name -->
{!! Form::text('input_name',' Username') !!}
{!! $errors->first('input_name') !!}

<br>
<!-- Input email -->
{!! Form::email('input_email','example@example.com') !!}
{!! $errors->first('input_email') !!} 

<!-- Input password -->
{!! Form::password('input_password') !!}
{!! $errors->first('input_password') !!} 
<br>
{!! Form::submit('Sign Up') !!} Forgot your password?
{!! Form::close() !!}

<br>

{!! Form::submit('Login') !!}
<!-- close -->
</div>
</div>
<div class="col-xs-1">
</div>
</div>
</div>
@stop