@extends('layouts.layout')

@section('content')
@if($user = Sentinel::inRole('admin'))
<div class="col-xs-5">
  <div class="btn-group">
    <a href="#" class="btn btn-default btn-raised">Excel</a>
    <a href="#" data-target="dropdown-menu" class="btn btn-default btn-raised dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li><a href="{{ URL::to('import') }}">Import</a></li>
      <li><a href="{{ URL::to('export/xls') }}">Export</a></li>
    </ul>
  </div>
@endif
<!--  -->
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
@if($user = Sentinel::inRole('admin'))
<div>
<a class="btn-floating green" href="import">
    Import
</a>
<br>
<a class="btn-floating green" href="{{URL::to('export')}}">
    Export
</a>
</div>
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
