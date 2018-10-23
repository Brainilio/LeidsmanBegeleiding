{!! Form::open(['url' => 'search', 'method'=>'POST', 'class'=>'navbar-form navbar-left','role' => 'search']) !!}
<div class="input-group custom-search-form container">
    <input type="text" class="form-control" name="search" id="id" placeholder="Search...">
    <span class="input-group-btn">
        <button class="btn btn-default sm" id="button_search" type="submit">
            Search
        </button>
    </span>
{!! Form::close() !!}
</div>

<br>
<br>

<div class="container">
{!! Form::open(['url' => 'search/filter', 'method' => 'POST', 'role' => 'filtersearch'])!!}

        <h2>Filter by:</h2>
        <select name="filtersearch">
        <option value="" disabled selected>Kies docent</option>
        <option value="1">Admin 1</option>
        <option value="2">Admin 2</option>
        </select>
        <button class="btn btn-primary sm" id="button_search" type="submit">
            Search
        </button>


        <br>
{!! Form::close() !!}

<form action="../posts">
    <input type="submit" value="Reset" />
</form>


</div>

<br>
