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
                                    @csrf
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {{Form::close()}} </td>


                                <td>
                                    {{Form::open(['action' => ['HomeController@status'], 'method' => 'POST'])}}
                                    @csrf
                                    {{Form::hidden('id', $post->id)}}
                                    @if($post->status == 1)
                                    {{Form::submit('Active', ['class' => 'btn btn-primary', 'name' => 'statusbutton','value' => '2'])}}
                                    @else
                                    {{Form::submit('Inactive', ['class' => 'btn btn-danger', 'name' => 'statusbutton','value' => '2'])}}
                                    @endif
                                    {{Form::close()}}
                                </td>

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
