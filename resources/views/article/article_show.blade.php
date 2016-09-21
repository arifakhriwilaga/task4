@extends('layouts.layout')

@section('content')
<br>
<div class="row">
<div class="col-xs-12">
<div class="container">
<div class="col-xs-6">
<div class="well">

 <table class="table table-striped table-hover">
    <tr>
    	<td>Article ID</td><td>{{ $list_article->article_id }}</td>
    </tr>
    <tr>
    	<td>Title Image</td><td>{{ $list_article->title_image }}</td>
    </tr>
    <tr>
    <td colspan="2"><img src="{{ asset('/image_upload/'.$list_article->image) }}" width="500px" height="300px"></td>
    </tr>
        <tr>
    	<td>Description</td><td>{{ $list_article->description_image }}</td>
    </tr>
</table>
</div>
</div>
<div class="col-xs-6">
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Comment</h3>
  </div>
  <div class="panel-body">
	{!! Form::open(['route' => 'comment_store']) !!}
	<div class="form-group"> 
   {!! Form::text('input_user_id','User Id') !!}
   {!! $errors->first('input_user_id') !!}
  <!-- {!! Form::text('user_id', $value = $list_article->id, array('class' => 'form-control', 'readonly')) !!} -->
	<!-- {!! Form::text('author', $value = $list_article->name, array('class' => 'form-control', 'readonly')) !!} -->
	</div>
  <div class="form-group">
  {!! Form::text('input_article_id','Article ID') !!}
  {!! $errors->first('input_article_id') !!}
  </div>
  <!-- Input content -->
  <div class="form-group">
  {!! Form::textarea('input_content') !!}
  {!! $errors->first('input_content') !!}
  </div>
	<div class="form-group">
	{!! Form::submit('Comment!') !!}
	{!! Form::close() !!}
	</div>
   </div>
</div>
</div>
</div>
</div>
<br>
<br>
</div>
<div class="row">
<div class="col-xs-12">
<div class="container">
<div class="col-xs-6">
<h3>Comment</h3>
@foreach($list_comment as $list)
<div class="list-group">
  <div class="list-group-item">
    <div class="row-picture">
    	<!-- <img class="circle" src="{{ asset('/image_upload/'.$list_article->image) }}"  alt="icon"> -->
    </div>
    <div class="row-content">
      <h4 class="list-group-item-heading">{{ $list->user_id }}</h4>
    	<p class="list-group-item-text">{{ $list->content }}</p>
    </div>
  </div>
</div>
 @endforeach
 </div>
</div>
</div>
</div>
@stop