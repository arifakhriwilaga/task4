@extends('layouts.layout')

@section('content')
@if($list_article->count())
<div class="container">
<div class="row">
<div class="col-xs-12">
    <table class="table table-striped table-hover ">
      <thead>
    <tr>
      <th class="text-center"><a id="id">ID<i id="ic-direction"></i></a></th>
      <th class="text-center">Title Image</th>
      <th class="text-center">User Description</th>
      <th class="text-center">Image</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
    @foreach ($list_article as $list)
  <tbody>
    <tr>
      <td><center>{{ $list->id }}</center></td>
      <td><center>{{ $list->title_image }}</center></td>
      <td><center>{{ $list->description_image }}</center></td>
      <td><center><img src="{{ asset('/image_upload/thumb'.$list->image) }}" width="228px" height="120px"></center></td>
      <td>
      <center>
        <a class="btn-floating green" href="article-show/{{$list->id}}">
            <i class="material-icons right">info_outline</i>
        </a>
        <a class="btn-floating orange" href="article-edit/{{$list->id}}">
            <i class="material-icons right">edit</i>
        </a>
        <a class="btn-floating red" href="article-delete/{{$list->id}}">
            <i class="material-icons right">delete</i>
        </a>
        </center>
      </td>
    </tr>
  </tbody>
  @endforeach
  </table>
@else
    <div class="alert alert-warning">
      <i class="fa fa-exclamation-triangle"></i> Empty image for you look
    </div>
@endif
</div>
</div>
</div>
@stop
