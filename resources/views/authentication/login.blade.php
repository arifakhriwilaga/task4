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
<!-- Input name -->
{!! Form::text('Email',' Your Email') !!}
{!! $errors->first('email') !!}
<br>
<!-- Input password -->
{!! Form::password('password') !!}
{!! $errors->first('password') !!} 
<br>
{!! Form::submit('Login') !!}
{!! Form::close() !!}
<!-- close -->
</div>
</div>
<div class="col-xs-1">
</div>
</div>
</div>
@stop