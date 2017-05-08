<!-- Destination Field -->
<div class="form-group col-sm-12">
    {!! Form::label('destination', 'Destination:') !!}
    {!! Form::select('destination_id', $destinations, null, ['class' => 'form-control']) !!}
</div>

<!-- Agenda At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agenda_at', 'Agenda At:') !!}
    {!! Form::date('agenda_at', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('agendas.index') !!}" class="btn btn-default">Cancel</a>
</div>
