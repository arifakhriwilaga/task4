@extends('layouts.layout')

@section('content')
  <br>
  <p>

<div class="col-xs-4">
</div>
<!-- Form Open -->

<div class="col-xs-6">
<div class="well">

{!! Form::open(['route' => 'article_store', 'enctype' => 'multipart/form-data']) !!}

<!-- Input User ID -->
    <div class="form-group">
        <input class="form-control" placeholder="User ID" type="text" name="input_user_id">
    </div>
{!! $errors->first('input_user_id') !!} 

<!-- Input title image -->
    <div class="form-group">
        <input class="form-control" placeholder="Title Image" type="text" name="input_title_image">
    </div>
{!! $errors->first('input_title_image') !!} 

<!-- Input description image -->
    <div class="form-group">
        <input class="form-control" placeholder="Description Image" type="text" name="input_description_image">	
    </div>
{!! $errors->first('input_description_image') !!}  

{!! Form::file('image',null) !!}
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