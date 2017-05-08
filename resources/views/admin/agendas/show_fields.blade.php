<!-- Id Field -->
<div class="form-group">
    {!! Form::label('destination', 'destination') !!}
    <p>{!! $agenda->destination->title !!}</p>
</div>

<!-- Destination Id Field -->
<div class="form-group">
    {!! Form::label('destination_id', 'Destination Id:') !!}
    <p>{!! $agenda->destination_id !!}</p>
</div>

<!-- Agenda At Field -->
<div class="form-group">
    {!! Form::label('agenda_at', 'Agenda At:') !!}
    <p>{!! $agenda->agenda_at !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $agenda->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $agenda->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $agenda->updated_at !!}</p>
</div>

