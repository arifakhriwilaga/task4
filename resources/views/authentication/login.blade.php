@extends('layouts.layout')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="col-xs-7">
</div>
<div class="col-xs-4">
<div class="well">
<!-- Open form -->
{!! Form::open(['route' => 'logged_in']) !!}
<!-- Input email -->
{!! Form::hidden('_token',$value = csrf_token())  !!}

{!! Form::label('email', 'Email') !!}
{!! Form::text('email') !!}
{!! $errors->first('email') !!}
<br>
<!-- Input password -->
{!! Form::label('password', 'Password') !!}
{!! Form::password('password') !!}
{!! $errors->first('password') !!} 
<br>
{!! Form::submit('Login') !!}
{!! Form::close() !!}
<!-- close -->
</div>
</div>
<div class="col-xs-1">
@if(Session::has('error'))
<span>{{Session::get('error')}}</span>
@endif
</div>
</div>
</div>
@stop