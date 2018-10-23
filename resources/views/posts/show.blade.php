@extends ('layouts.app')

@section('content')

<div class="container">
<a href="/posts" class="btn btn-default">Go back</a>
<h1>{{$post->title}}</h1>
@auth
{{Form::open(['action' => ['FavController@favourite'], 'method' => 'POST', 'class' => 'float-right'])}}
{{Form::hidden('id', $post->id)}}
{{Form::submit('Favourite', ['class' => 'btn btn-success'])}}
{{Form::close()}}
@endauth
<img width="500" height="500" src="/storage/cover_images/{{$post->cover_image}}">
    <div class="well container">
        <h3><a href="/posts/{{$post->id}}">{{$post->title }}</a></h3>
        <small>Written on {{$post->created_at}} and by {{$post->user->name}}</small>
        <br>
        <div>
                {{$post->body}}
        </div>

    </div>

   @auth
   @if(Auth::user()->admin == 1)
    <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit post</a>

    {{Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])}}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {{Form::close()}}



    @endif
    @endauth

    @endsection
</div>
