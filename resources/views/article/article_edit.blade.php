@extends('layouts.layout')

@section('content')
  <br>
  <p>

<div class="col-xs-4">
</div>
<div class="col-xs-4">
<div class="well">

<!-- Open form edit -->
{!! Form::model($list_article,['route'=> array('article_update', $list_article->id), 'method'=>'PUT','files' => true]) !!}
<!-- Input id -->
{!! Form::hidden('input_id',$list_article->id, array ('class' => 'form-control')) !!}
{!! $errors->first('input_id',null) !!}
<!-- Input user id -->
{!! Form::hidden('input_user_id',$list_article->user_id, array ('class' => 'form-control')) !!}
{!! $errors->first('input_user_id',null) !!}

<!-- Input title image -->
{!! Form::text('input_title_image',$list_article->title_image, array ('class' => 'form-control')) !!}
{!! $errors->first('input_title_image',null) !!} 

<!-- Input description image -->
{!! Form::text('input_description_image',$list_article->description_image, array ('class' => 'form-control')) !!}
{!! $errors->first('input_description_image',null) !!} 
<img src="{{ asset('/image_upload/'.$list_article->image) }}" width="200px" height="100px">
{!! Form::text('input_image',$list_article->image, array ('class' => 'form-control')) !!}

{!! Form::file('image') !!}
{!! Form::submit('Save') !!}

{!! Form::close() !!}
<!-- Close form -->
</div>
</div>
<div class="col-xs-4">
</div>
@stop