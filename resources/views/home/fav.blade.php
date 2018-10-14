

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



                    <h3>Alle gebruikers</h3>
                    @if(count($post) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>Favoriet.id</th>
                            <th>User.id</th>
                            <th>Favoriet.post.id</th>
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

                    {{-- @if(count($postname) > 0)
                    @foreach($postname as $postnames)
                    <ul>
                    <li>{{$postnames->title}}</li>
                    </u>
                    @endforeach
                    @else
                    <p>Geen titels</p>
                    @endif --}}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
