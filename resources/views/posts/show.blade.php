@extends ('layouts.app')

@section('content')

<a href="/posts" class="btn btn-default">Go back</a>
<h1>{{$post->title}}</h1>
@auth
{{Form::open(['action' => ['PagesController@buy', $post->id], 'method' => 'POST', 'class' => 'float-right'])}}
{{Form::hidden('_method', 'PUT')}}
{{Form::submit('Buy', ['class' => 'btn btn-success'])}}
{{Form::close()}}
@endauth
<img style="width:100px height:500px" src="/storage/cover_images/{{$post->cover_image}}">
    <div class="well">
        <h3><a href="/posts/{{$post->id}}">{{$post->title }}</a></h3>
        <small>Written on {{$post->created_at}} and by {{$post->user->name}}</small>
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
