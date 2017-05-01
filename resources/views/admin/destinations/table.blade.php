<table class="table table-responsive" id="destinations-table">
    <thead>
        <th>Title</th>
        <th>Abstract</th>
        <th>Image</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($destinations as $destination)
        <tr>
            <td>{!! $destination->title !!}</td>
            <td>{!! $destination->abstract !!}</td>
            <td><img src="{!! $destination->image !!}" class="img img-responsive" style="max-height: 10em"></td>
            <td>
                {!! Form::open(['route' => ['destinations.destroy', $destination->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('destinations.show', [$destination->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('destinations.edit', [$destination->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
