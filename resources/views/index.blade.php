@extends('layouts.layout')

@section('content')
<br>

<div class="row">
<div class="col-xs-12">
<div class="col-xs-2">
</div>
<div class="col-xs-8">
  <a class="btn-floating cyan" href="article-create">
  </a>
  <br>
  <p></p>
  @if($user = Sentinel::findUserById(1))
      <span>{{ $user->email }}</span>
  @endif
<div id="image_container">
<input type="text" id="search_text" onkeyup="search_data(this.value, 'result');">
@yield('content_image')
  <!-- include content image -->
</div>
<div class="col-xs-2">
</div>
</div>
</div>
</div>
@stop
