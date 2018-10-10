

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a href="/home">Dashboard<a></div>

                    @if(Auth::user()->admin == 1)
                    <div class="card-header"><a href="/home/users">Gebruikers<a></div>
                        @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



                    <h3>Alle gebruikers</h3>
                    @if(count($favourite) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Naam</th>
                            <th>Email</th>
                        </tr>
                        @foreach($favourite as $favourites)
                        <tr>
                            <td>{{$favourites->id}}</td>
                            <td>{{$favourites->user_id}}</td>
                            <td>{{$favourites->post_id}}</td>

                            </tr>
                        @endforeach
                    </table>
                    @else
                    <h4>Geen Favorieten!</h4>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
