@extends('layouts.layout')

@section('content')
  <br>
  <p>

<div class="col s4">
</div>
<div class="col s4">
{!! Form::open(['route' => 'officer_store']) !!}
<!-- Input name -->
{!! Form::label('name', 'Name') !!}
{!! Form::text('input_name',null) !!}
<!-- Input address -->
{!! Form::label('address', 'Address') !!}
{!! Form::text('input_address',null) !!}

{!! Form::submit('Add Officer!') !!}
{!! Form::close() !!}
</div>
<div class="col s4">
</div>
@stop