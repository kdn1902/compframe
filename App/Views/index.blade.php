@extends('layout')

@section('content')

      <!-- Example row of columns -->
	  @foreach ($posts as $post)
      <div class="row">
        <div class="col-md-12">
          <h2>{{ $post->title }}</h2>
          <p>{!! $post->post !!}</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>
	  @endforeach
	  {!! $paginator !!}
@endsection
	  
