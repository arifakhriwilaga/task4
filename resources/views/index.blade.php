@extends('layouts.layout')

@section('content')
<div class="container">
<div class="row">
	<div class="col-xs-12">
		<div class="col-xs-7">
		</div>
		<div class="col-xs-5">
		@if($user = Sentinel::inRole('admin'))
		  <div class="btn-group">
		    <a href="#" class="btn btn-default btn-raised">Excel</a>
		    <a href="#" data-target="dropdown-menu" class="btn btn-default btn-raised dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
		    <ul class="dropdown-menu">
		      <li><a href="{{ URL::to('import') }}">Import</a></li>
		    </ul>
		  </div>
		@endif
		<input type="text" id="keywords" placeholder="Keyword">
		<button id="search" class="btn btn-raised btn-info" type="button">Search</button> 
		</div>
	</div>
</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12" id="enrolls-list">
				@foreach ($list_article as $article)
				    <h1>{!!$article->title!!}</h1>
					<div id="list">
					<!-- content image  -->
					@include('image.content_image')
					</div>
			  	@endforeach
		 <input id="direction" type="hidden" value="asc" />
		</div>
	</div>
</div>
<div class="row">
  	<div class="col-xs-7">
  	</div>
  	<div class="col-xs-5"> 
  	   {!! $list_article->render() !!}
	</div>
</div>
<script>
</script>
<script>
$(document).ready(function() {
  $(document).on('click', '#id', function(e) {
    sort_articles();
    e.preventDefault();
  });
});

function sort_articles() {
  $('#id').on('click', function() {
    $.ajax({
      url : '/articles',
      typs : 'GET',
      dataType : 'json',
      data : {
        "direction" : $('#direction').val()
      },
      success : function(data) {
        $('#image_container').html(data['view']);
        $('#direction').val(data['direction']);
        if(data['direction'] == 'asc') {
          $('i#ic-direction').attr({class: "fa fa-arrow-up"});
        } else {
          $('i#ic-direction').attr({class: "fa fa-arrow-down"});
        }
      },
      error : function(xhr, status, error) {
        console.log(xhr.error + "\n ERROR STATUS : " + status + "\n" + error);
      },
      complete : function() {
        alreadyloading = false;
      }
    });
  });
}
</script>
@stop
