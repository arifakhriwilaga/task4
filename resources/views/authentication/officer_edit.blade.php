@extends('layouts.layout')

@section('content')
  <br>
  <p>

<div class="col s4">
</div>
{!! Form::model($list_officer,['route'=> array('officer_update',$list_officer->id), 'method'=>'PUT']) !!}
<div class="col s4">
<!-- Input name -->
{!! Form::label('name', 'Name') !!}
{!! Form::text('name',null) !!}
{!! $errors->first('name',null) !!}

<!-- Input address -->
{!! Form::label('address', 'Address') !!}
{!! Form::text('address',null) !!}
{!! $errors->first('address',null) !!}

<!-- Input title image -->
{!! Form::label('title_image', 'Title image') !!}
{!! Form::text('title_image',null) !!}
{!! $errors->first('title_image',null) !!} 

<!-- Input description image -->
{!! Form::label('description_image', 'Description Image') !!}
{!! Form::text('description_image',null) !!}
{!! $errors->first('description_image,null') !!}  
<img src="{{ asset('/image_upload/'.$list_officer->image) }}" width="200px" height="100px">

{!! Form::file('image') !!}


{!! Form::submit('Save') !!}
</div>
{!! Form::close() !!}
<div class="col s4">
</div>
@stop