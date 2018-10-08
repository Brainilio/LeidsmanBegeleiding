@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/home">Dashboard<a></div>

                    <div class="card-header"><a href="/home/fav">Favorieten<a></div>

                    @if(Auth::user()->admin == 1)
                    <div class="card-header"><a href="/home/users">Gebruikers<a></div>
                        @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->admin == 1)
                    <a href="/posts/create" class="btn btn-primary">Maak nieuw pakket aan!</a>
                    @endif

                    <h3>Jouw pakketten</h3>
                    @if(count($posts) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                                <td>{{$post->title}}</td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></th>
                                <td> {{Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])}}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {{Form::close()}} </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                    <h4>Geen pakketten!</h4>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
