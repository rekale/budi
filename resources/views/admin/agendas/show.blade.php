@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            Agenda
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('admin.agendas.show_fields')
                    <a href="{!! route('agendas.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
