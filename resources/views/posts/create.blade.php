@extends ('layouts.app')

@section('content')

<a href="/posts" class="btn btn-default">Go back</a>
<h3>Create Post</h3>

{!! Form::open(['url' => 'foo/bar']) !!}
    //
{!! Form::close() !!}

    @endsection
