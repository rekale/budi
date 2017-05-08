@extends('layouts.front.app')

@section('content')
<div class="container-fluid">
    <div class="col-md-9 thumbnail" style="padding: 40px 15px">
        <h1>{{ $destination->title }}</h1>
        <hr>
        <img src="{{ $destination->image }}" class="img-responsive img-thumbnail">
        <div class="caption">
          <p>{!! $destination->body !!}</p>
        </div>
    </div>
    <div class="col-md-3" style="padding: 140px 15px">
        <h3>Agenda</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Acara</th>
                </tr>
            </thead>
            <tbody>
                @foreach($destination->agendas as $agenda)
                <tr>
                    <td>{{ $agenda->agenda_at }}</td>
                    <td>{{ $agenda->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <hr>
        <h3>Pendaftar</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                </tr>
            </thead>
            <tbody>
                @foreach($destination->participants as $participant)
                <tr>
                    <td>{{ $participant->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
