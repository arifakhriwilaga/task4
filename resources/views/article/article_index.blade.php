@extends('layouts.layout')

@section('content')
<br>
<div class="col-xs-2">
</div>
<div class="col-xs-8">
<div class="panel panel-default">
    <div class="panel-body">
  <a class="btn-floating cyan" href="article-create">
    <i class="material-icons right">add</i>
  </a>
  <br>
  <p></p>
@if($user = Sentinel::findUserById(1))
    <span>{{ $user->email }}</span>
@endif
  @if(Session::has('message'))
    <span>{{Session::get('message')}}</span>
    @endif
    
  <table class="striped">
    <tr>
    	<th>ID</th>
    	<th>Name</th>
      <th>Title Image</th>
      <th>Description Image</th>
      <th>Image</th>
        <th colspan="2">Action</th>
    </tr>
    @foreach ($list_article as $list)
    <tr>
    	<td>{{ $list->id }}</td>
    	<td>{{ $list->name }}</td>
      <td>{{ $list->title_image }}</td>
      <td>{{ $list->description_image }}</td>
      <td><img src="{{ asset('/image_upload/thumb'.$list->image) }}" width="200px" height="100px"></td>
        <td>
            <a class="btn-floating green" href="article-show/{{$list->id}}">
                <i class="material-icons right">info_outline</i>
            </a>
            <a class="btn-floating orange" href="article-edit/{{$list->id}}">
                <i class="material-icons right">edit</i>
            </a>
            <a class="btn-floating red" href="article-delete/{{$list->id}}">
                <i class="material-icons right">delete</i>
            </a>
        </td>
    </tr>
    @endforeach
  </table>
  </div>
  </div>
<div class="col-xs-2">
</div>
</div>
@stop
