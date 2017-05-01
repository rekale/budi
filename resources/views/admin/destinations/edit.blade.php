@extends('layouts.admin.app')

@section('content')
    <section class="content-header">
        <h1>
            Destination
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($destination,
                    ['route' => ['destinations.update', $destination->id], 'method' => 'patch', 'files' => true]) !!}

                        @include('admin.destinations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
