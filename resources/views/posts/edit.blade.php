@extends ('layouts.app')

@section('content')

<a href="/posts" class="btn btn-default">Go back</a>
<div class="container">
<h3>Edit Post</h3>

{!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
    {{Form::label('body','Body')}}
    {{Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>
    <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        <div class="form-group">
                <select name="status" class="form-control">

                        <option value="1"  <?php if($post->status == '1') { ?> selected="selected" <?php }?>>Enable</option>

                        <option value="0" <?php if($post->status == '0') { ?> selected="selected" <?php }?>>Disable</option>

         </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}

{!! Form::close() !!}
        </div>



    @endsection
