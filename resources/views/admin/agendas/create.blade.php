@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            Agenda
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'agendas.store']) !!}

                        @include('admin.agendas.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
