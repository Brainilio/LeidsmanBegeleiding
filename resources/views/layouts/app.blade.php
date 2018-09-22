<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{ config('app.name', 'project') }}</title>

</head>
<body>
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
@include('inc.navbar')
</div>


<div class="container">
    @include('inc.messages')
    @yield('content')
</div>


</body>
</html>
