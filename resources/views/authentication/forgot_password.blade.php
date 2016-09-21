@extends('layouts.layout')
@section('content')
<div class="row">
 <div class="col-xs-12">
  <div class="col-xs-3">
  </div>
 <div class="col-xs-6">
  <div class="well">
  <!-- Open form -->
  
  <!-- Input email -->
  {!! Form::email('input_email','example@example.com') !!}
  {!! $errors->first('input_email') !!} 

  {!! Form::submit('Forgot') !!} Forgot your password?

  <!-- close -->
   </div>
 </div>
   <div class="col-xs-3">
   </div>
 </div>
</div>
@stop