@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('inc.tabhome')
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->admin == 1)
                    <a href="/posts/create" class="btn btn-primary">Maak nieuw pakket aan!</a>
                    <br>
                    <br>
                    <h3>Aangemaakte pakketten</h3>
                    @if(count($posts) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>Status</th>
                        </tr>
                        @foreach($posts as $post)
                        <tr>
                                <td><h3>{{$post->title}}</h3></td>
                                <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></th>
                                <td> {{Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST'])}}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {{Form::close()}} </td>
                                    @if($post->status == 1)
                                <td><button type="button" class="btn btn-primary" disabled>Active</button></td>
                                @else
                                <td><button type="button" class="btn btn-danger " disabled>Inactive</button></td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                    @else
                    <h4>Geen pakketten!</h4>
                    @endif
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
