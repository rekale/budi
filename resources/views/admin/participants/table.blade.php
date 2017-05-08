<table class="table table-responsive" id="participants-table">
    <thead>
        <th>Destination</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Position</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($participants as $participant)
        <tr>
            <td>{!! $participant->destination->title !!}</td>
            <td>{!! $participant->name !!}</td>
            <td>{!! $participant->email !!}</td>
            <td>{!! $participant->phone !!}</td>
            <td>{!! $participant->position !!}</td>
            <td>
                {!! Form::open(['route' => ['participants.destroy', $participant->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('participants.show', [$participant->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('participants.edit', [$participant->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
