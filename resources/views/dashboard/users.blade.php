<h3>Jouw pakketten</h3>
@if(count($posts) > 0)
<table class="table table-striped">
    <tr>
        <th>Title</th>
        <th></th>
        <th></th>
    </tr>
    @foreach($posts as $post)
    <tr>
            <td>{{$post->title}}</td>
            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></th>
            <td> {{Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])}}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {{Form::close()}} </td>
        </tr>
    @endforeach
</table>
@else
<h4>Geen pakketten!</h4>
@endif
