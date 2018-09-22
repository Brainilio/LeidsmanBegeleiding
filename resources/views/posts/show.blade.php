@extends ('layouts.app')

@section('content')

<a href="/posts" class="btn btn-default">Go back</a>
<h1>{{$post->title}}</h1>

    <div class="well">
        <h3><a href="/posts/{{$post->id}}">{{$post->title }}</a></h3>
        <small>Written on {{$post->created_at}}</small>
        <div>
                {{$post->body}}
        </div>
    </div>
    @endsection
