@extends('layouts.app')

@section('content')
<div class="container">
<h1>{{ $title  }}</h1>
<br>
@if(count($posts) > 0)


<div class="card-group">
    @foreach($posts as $post)
    @endforeach
    @for($i = 0; $i<3; $i++)
    <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="/storage/cover_images/{{$post->cover_image}}" alt="Card image cap">
            <div class="card-body">
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->body}}</p>
              <a href="posts" class="btn btn-primary">Go somewhere</a>
            </div>
            <div class="card-footer">
            <small class="text-muted">{{$post->created_at}}</small>
                  </div>
          </div>
          <br>
          @endfor

        </div>



@endif
</div>
<br>
@endsection

