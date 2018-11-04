<div class="card-header"><a href="/home">Dashboard<a></div>

<div class="card-header"><a href="/home/fav/{{Auth::user()->id}}">Favorieten<a></div>

@if(Auth::user()->admin == 1)
<div class="card-header"><a href="/home/users">Gebruikers<a></div>
@endif

<div class="card-header"><a href="/home/edituser/{{Auth::user()->id}}">Wijzig profiel<a></div>


