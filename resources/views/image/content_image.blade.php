@if($list_article->count())
    <table class="table table-striped table-hover ">
      <thead>
    <tr>
      <th class="text-center"><a id="id">ID<i id="ic-direction"></i></a></th>
      <th class="text-center">Title Image</th>
      <th class="text-center">User Description</th>
      <th class="text-center">Image</th>
      <th class="text-center">Comment</th>
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
        @if($user = Sentinel::check())
          <a href="comment-show/{{$list->id}}">
            <button type="button" class="btn btn-raised btn-sm btn-default">
              <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
            </button>
          </a>
        @endif
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