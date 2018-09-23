@extends ('layouts.app')

@section('content')

<a href="/posts" class="btn btn-default">Go back</a>
<h1>{{$post->title}}</h1>

    <div class="well">
        <h3><a href="/posts/{{$post->id}}">{{$post->title }}</a></h3>
        <small>Written on {{$post->created_at}} and by {{$post->user_id}}</small>
        <div>
                {{$post->body}}
        </div>
    </div>
    <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit post</a>

    {{Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])}}
        {{Form::hidden('_method', 'DELETE')}}
        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {{Form::close()}}
    @endsection
