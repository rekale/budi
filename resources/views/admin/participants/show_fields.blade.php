<!-- Id Field -->
<div class="form-group">
    {!! Form::label('destination', 'Destination:') !!}
    <p>{!! $participant->destination->title !!}</p>
</div>

<!-- Destination Id Field -->
<div class="form-group">
    {!! Form::label('destination_id', 'Destination Id:') !!}
    <p>{!! $participant->destination_id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $participant->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $participant->email !!}</p>
</div>

<!-- Phone Field -->
<div class="form-group">
    {!! Form::label('phone', 'Phone:') !!}
    <p>{!! $participant->phone !!}</p>
</div>

<!-- Position Field -->
<div class="form-group">
    {!! Form::label('position', 'Position:') !!}
    <p>{!! $participant->position !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $participant->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $participant->updated_at !!}</p>
</div>

