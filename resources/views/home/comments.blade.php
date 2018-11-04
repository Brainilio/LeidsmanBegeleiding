
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



                    <h3>Jouw Comments </h3>
                    @if(count($comments) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Comment ID</th>
                            <th>Gebruiker naam</th>
                            <th>Post Id</th>
                            <th>Comment</th>
                            <th>Delete</th>

                        </tr>
                        @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td>{{$comment->name}}</td>
                            <td><a href="/posts/{{$comment->post_id}}">{{$comment->post_id}}</a></td>
                            <td>{{$comment->comment}}</td>
                            <td> {{Form::open(['action' => ['CommentsController@destroy', $comment->id], 'method' => 'POST'])}}
                                    @csrf
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {{Form::close()}}</td>


                        </tr>
                        @endforeach
                    </table>
                    @else
                    <h4>Geen
                        Comments!</h4>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
