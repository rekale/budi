@extends('layouts.front.app')

@section('content')
<div class="container">
    <div style="padding: 40px 15px">
            <h2>Travel</h2>
            <hr>
          @foreach($destinations->chunk(3) as $destChunk)
            <div class="row">
              @foreach($destChunk as $dest)
                <div class="col-md-4">
                  <div class="thumbnail">
                    <img src="{{ $dest->image }}" alt="{{ $dest->title }}" style="max-height: 250px">
                    <div class="caption">
                      <h3>{{ $dest->title }}</h3>
                      <p>{{ $dest->abstract }}</p>
                      <p><a href="{{ route('dest-show', ['slugTitle' => str_slug($dest->title, '-')]) }}" class="text-primary" role="button">More..</a></p>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endforeach
        {{ $destinations->links() }}
    </div>
</div>
@endsection
