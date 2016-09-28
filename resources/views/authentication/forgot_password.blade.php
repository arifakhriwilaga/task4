@extends('layouts.layout_login')
@section('content')
<div class="row">
 <div class="col-xs-12">
  <div class="col-xs-7">
  </div>
 <div class="col-xs-4">
  <div class="well">
  <!-- Open form -->
  <h2><center>Welcome to my blog</center></h2>
{!! Form::open(['route' => 'reset-password-store']) !!}
  {{ csrf_field() }}
  <center>{!! Form::email('email', null,['placeholder' =>'Entry your email']) !!}</center>
  {!! $errors->first('email') !!} 
  <center>{!! Form::submit('Forgot', ['class' => 'btn btn-raised btn-info']) !!}</center>
{!! Form::close() !!}
  <!-- close -->
   </div>
 </div>
   <div class="col-xs-1">
   </div>
 </div>
</div>
@stop