

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



                    <h3>Jouw Favorieten </h3>
                    @if(count($favourite) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Favoriet.id</th>
                            <th>Gebruiker naam</th>
                            <th>Post naam</th>
                            <th>Delete</th>
                        </tr>
                        @foreach($favourite as $favourites)
                        <tr>
                            <td>{{$favourites->id}}</td>
                            <td>{{$favourites->name}}</td>
                            <td>{{$favourites->title}}</td>
                            <td> {{Form::open(['action' => ['FavController@destroy', $favourites->id], 'method' => 'POST'])}}
                                    @csrf
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {{Form::close()}}</td>

                        </tr>
                        @endforeach
                    </table>
                    @else
                    <h4>Geen

                        Favorieten!</h4>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
