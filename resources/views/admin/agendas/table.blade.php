<table class="table table-responsive" id="agendas-table">
    <thead>
        <th>Destination</th>
        <th>Agenda At</th>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($agendas as $agenda)
        <tr>
            <td>{!! $agenda->destination->title !!}</td>
            <td>{!! $agenda->agenda_at !!}</td>
            <td>{!! $agenda->name !!}</td>
            <td>
                {!! Form::open(['route' => ['agendas.destroy', $agenda->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('agendas.show', [$agenda->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('agendas.edit', [$agenda->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
