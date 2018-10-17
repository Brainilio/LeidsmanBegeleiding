{!! Form::open(['url' => 'search', 'method'=>'POST', 'class'=>'navbar-form navbar-left','role' => 'search'])  !!}
{{csrf_field()}}
<div class="input-group custom-search-form">
    <input type="text" class="form-control" name="search" id="id" placeholder="Search...">
    <span class="input-group-btn">
        <button class="btn btn-default-sm" id="button_search" type="submit">
            Search
        </button>
    </span>
</div>
{!! Form::close() !!}

{{--
'action' => ['SearchController@scopeSearch'], --}}
