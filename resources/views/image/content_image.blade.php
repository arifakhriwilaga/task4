@extends('index')

@section('content_image')
@if($list_article->count())
<div class="">Export</div>
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
      @if($user = Sentinel::check())
      <td>
        <a class="btn-floating green" href="comment-show/{{$list->id}}">
            Comment
        </a>
      </td>
      @endif
    </tr>
    @endforeach
  </table>
  <!-- PAGINATION -->
  {!! $list_article->render() !!}
  @else
    <div class="alert alert-warning">
      <i class="fa fa-exclamation-triangle"></i> Empty image for you look
    </div>
@endif
@stop
