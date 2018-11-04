@extends ('layouts.app')

@section('content')

<div class="container">
<a href="/posts" class="btn btn-default">Go back</a>
<h1>{{$post->title}}</h1>
@auth

@if($days > 3 || Auth::user()->admin == 1)
{{Form::open(['action' => ['FavController@favourite'], 'method' => 'POST', 'class' => 'float-right'])}}
@csrf
{{Form::hidden('id', $post->id)}}
{{Form::submit('Favourite', ['class' => 'btn btn-success'])}}
{{Form::close()}}
@else
<h3>You have to wait {{ 3-$days }} more days to favourite!</h3>
@endif

@endauth
<img width="500" height="500" src="/storage/cover_images/{{$post->cover_image}}">
    <div class="well container">
        <h3><a href="/posts/{{$post->id}}">{{$post->title }}</a></h3>
        <small>Written on {{$post->created_at}} and by {{$post->user->name}}</small>
        <br>
        <div>
                {{$post->body}}
        </div>
        <br>
    <h4>Post exists for: {{ $days }} days</h4>
    </div>

   @auth
   @if(Auth::user()->admin == 1)
    <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit post</a>

    {{Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])}}
    @csrf
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {{Form::close()}}
    @endif

<div class="container">
<h4>Post a Comment:</h4>
@endauth


@guest
<h4><a href="../login">Log In </a>om te commenten!</h4>
@endguest



</div>
    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($post->comments as $comment)
                    <div class="comment">
                        <p><strong>Name</strong>: {{ $comment->name }}</p>
                        <p><strong>Comment</strong>: <br/>{{ $comment->comment }}</p>
                        @auth
                        @if(Auth::user()->id == $comment->user_id || Auth::user()->admin == 1)
                        {{Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'POST', 'class' => 'float-right'])}}
                        @csrf
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                        @endif
                    {{Form::close()}}
                    @endauth
                    </div>
                @endforeach
            </div>
        </div>

    @auth



    @if(Auth::user()->logincounter > 3 || Auth::user()->admin == 1)

 {!! Form::open(['action' => ['CommentsController@store'], 'method' => 'POST']) !!}
 {{Form::hidden('post_id', $post->id)}}

  <div class="form-group">
      {{Form::label('name', 'Name')}}
      {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
  </div>
  <div class="form-group">
  {{Form::label('comment','Comment')}}
  {{Form::textarea('comment', '', ['class' => 'form-control', 'placeholder' => 'Comment Text'])}}
  </div>
  {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

{!! Form::close() !!}

  @else

<div class="alert alert-danger container" role="alert">
        Sorry, jij mag pas na {{10-Auth::user()->logincounter}} log-ins commenten!
      </div>
@endif


 @endauth


</div>
    @endsection
</div>
