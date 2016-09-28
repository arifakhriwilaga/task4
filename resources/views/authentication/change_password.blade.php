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
{!! Form::open(['url' => 'change-password/store/'.$forgot_token]) !!}
<table = "0">
{{ csrf_field() }}
<tr>
<td>
<center>{!! Form::email('email',$email) !!}</center>
</td>
</tr>
<tr>
<td>
  {!! Form::label('password', 'New Password') !!}
</td>
<td>&nbsp;</td>
<td>
<center>{!! Form::password('password', null) !!}</center>
  {!! $errors->first('password') !!}
</td>
</tr>
<tr>
<td>
  {!! Form::label('confirm_password', 'Password Confirmation') !!}
</td>
<td>&nbsp;</td>
<td>
<center>{!! Form::password('password_confirmation', null) !!}</center>
  {!! $errors->first('password_confirmation') !!} 
</td>
</tr>
  <tr>
  <td colspan="2">
  <center>{!! Form::submit('Change', ['class' => 'btn btn-raised btn-info']) !!}</center>
</td>
</tr>
</table>
{!! Form::close() !!}
  <!-- close -->
   </div>
 </div>
   <div class="col-xs-1">
   </div>
 </div>
</div>
@stop