@extends('layouts.layout_login')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="col-xs-7">
</div>
<div class="col-xs-4">
<div class="well">
<!-- Open form -->
{!! Form::open(['route' => 'logged_in']) !!}
{{ csrf_field() }}
<h2><center>Welcome to my blog</center></h2>
<br>
<!-- Input email -->
  <div>@if(Session::has('notice'))
    <span>{{Session::get('notice')}}</span>
  @endif
  </div>
{!! Form::label('email', 'E-Mail Address') !!}
{!! Form::text('email') !!}
{!! $errors->first('email') !!}
<!-- Input password -->
{!! Form::label('email', 'Your Password') !!}
{!! Form::password('password') !!}
{!! $errors->first('password') !!}
<center>{!! Form::submit('Login', ['class' => 'btn btn-raised btn-info']) !!}</center> 
<center>{!! link_to('reset-password', 'Forgot your password?') !!}</center> 
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