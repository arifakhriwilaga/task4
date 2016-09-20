@extends('layouts.layout')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="col-xs-7">
</div>
<div class="col-xs-4">
<div class="well">
<!-- Open form -->

{!! Form::open(['route' => '']) !!}

<!-- Input name -->
{!! Form::text('input_name',' Username or Email') !!}
{!! $errors->first('input_name') !!}

<br>

<!-- Input password -->
{!! Form::password('input_password') !!}
{!! $errors->first('input_password') !!} 
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