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

                    <div class="container">
                            <h3>Edit Profile</h3>

                            {!! Form::open(['action' => ['HomeController@update', $user->id], 'method' => 'POST']) !!}
                            @csrf
                                <div class="form-group">
                                    {{Form::label('name', 'Name')}}
                                    {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Email'])}}
                                </div>
                                <div class="form-group">
                                {{Form::label('email','Email')}}
                                {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
                                </div>
                                {{Form::hidden('_method', 'PUT')}}
                                {{Form::submit('Update', ['class' => 'btn btn-primary'])}}

                            {!! Form::close() !!}
                                    </div>





                    @endsection
