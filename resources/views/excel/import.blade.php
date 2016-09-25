@extends('layouts.layout')

@section('content')
  <br>
  <p>

<div class="col-xs-4">
</div>
<!-- Form Open -->

<div class="col-xs-6">
<div class="well">
<!-- open form for import -->
{!! Form::open(['route' => 'import_store', 'enctype' => 'multipart/form-data']) !!}
<h2>Import</h2>
{!! Form::file('import_file',null) !!}
{!! $errors->first('image') !!} 

<br><br><br>
{!! Form::submit('Save') !!}
{!! Form::close() !!}
</div>
<!-- close form -->

</div>
<div class="col-xs-4">
</div>
@stop