@extends('layouts.layout')

@section('content')
<br>
<div class="row">
<div class="container">
<div class="col-xs-12">
<div class="col-xs-6">
<div class="well">

 <table class="table table-striped table-hover">
    <tr>
    <td colspan="2">
    @if($user = Sentinel::inRole('admin'))
      <div class="btn-group">
        <a href="#" class="btn btn-default btn-raised">Excel</a>
        <a href="#" data-target="dropdown-menu" class="btn btn-default btn-raised dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
        <ul class="dropdown-menu">
        <li><a href="{{ URL::to('export/'.$list_article->id) }}">Export</a></li>  
        </ul>
      </div>
    @endif
    </td>
    </tr>
    <tr>
    	<td>Article ID</td><td>{{ $list_article->id }}</td>
    </tr>
    <tr>
    	<td>Title Image</td><td>{{ $list_article->title_image }}</td>
    </tr>
    <tr>
    <td colspan="2"><img src="{{ asset('/image_upload/'.$list_article->image) }}" width="450px" height="300px"></td>
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
  <!-- input hidden id user -->
  {!! Form::label('user_id', 'User Id')  !!}
  {!! Form::text('input_user_id', Sentinel::getUser()->id) !!}
  {!! $errors->first('input_user_id') !!}
  <!-- end -->
  <br>
  <!-- input hidden id article -->
  {!! Form::label('article_id', 'Article ID') !!}
  {!! Form::text('input_article_id',$list_article->id) !!}
  {!! $errors->first('input_article_id') !!}
  <!-- end -->
  </div>
  <div class="form-group">
  <!-- input comment author -->
  {!! Form::text('author', Sentinel::getUser()->username, array('class' => 'form-control', 'readonly')) !!}
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
<br>
<br>
</div>
</div>
<div class="row">
<div class="container">
<div class="col-xs-12">
<div class="col-xs-6">
<h3>Comment</h3>
@foreach($list_comment as $list)
<div class="list-group">
  <div class="list-group-item">
    <div class="row-picture">
    	<!-- <img class="circle" src="{{ asset('/image_upload/'.$list_article->image) }}"  alt="icon"> -->
    </div>
    <div class="row-content">
      <h4 class="list-group-item-heading">{{ $list->user->email }}</h4>
    	<p class="list-group-item-text">{{ $list->content }}</p>
    </div>
  </div>
</div>
 @endforeach
 </div>
 <div class="col-xs-6">
 </div>
</div>
</div>
</div>
@stop