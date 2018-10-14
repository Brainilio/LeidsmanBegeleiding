

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
                    @if(count($users) > 0)
                    <table class="table table-striped">
                        <tr>
                            <th>ID</th>
                            <th>Naam</th>
                            <th>Email</th>
                        </tr>
                        @foreach($users as $user)
                        <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>

                            </tr>
                        @endforeach
                    </table>
                    @else
                    <h4>Geen gebruikers!</h4>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
