@extends ('layouts.app')
@section('content')
    <h1 class="container">Pakketten</h1>
@include('inc.search')
@if(count($posts) > 0)
@foreach($posts as $post)
    <div class="container">
        <div class="row">
            <div class="col">
                    <h3><a href="/posts/{{$post->id}}">{{$post->title }}</a></h3>
            </div>
            <div class="col-md-auto">
                    <img style="width:100px" src="/storage/cover_images/{{$post->cover_image}}">

            </div>
            <div class="col col-lg-2">
                    <small>Written on {{$post->created_at}}</small>

            </div>
        </div>

    </div>
    <br>



    @endforeach

    @else
        <p>Geen pakketten gevonden!</p>
    @endif
    <div class="container">
    {{ $posts->links() }}
    </div>
    @endsection
