@extends('layouts.front.app')

@section('content')
<div class="container">
    <div style="padding: 40px 15px">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    @foreach($destRand as $dest)
      <li data-target="#carousel-example-generic" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active':'' }}"></li>
    @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    @foreach($destRand as $dest)
      <div class="item {{ $loop->first ? 'active':'' }}" style="background-image: url({{ $dest->image }});">
        <img src="{{ $dest->image }}" alt="{{ $dest->title }}">
        <div class="carousel-caption">
          {{ $dest->abstract }}
        </div>
      </div>
    @endforeach
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
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
